<?php

use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertEquals;

class UserTest extends TestCase
{
    public function test_returns_full_name()
    {

        // commented the below line cuz I will be using the autoload.php
        // require "User.php";

        $user = new User;

        $user->first_name = "lotfy";
        $user->surname = "wohiesh";

        $this->assertEquals("lotfy wohiesh", $user->get_full_name());
    }

    public function test_full_name_empty_by_default()
    {
        $user = new User;
        $this->assertEquals('', $user->get_full_name());
    }

    public function test_notification_is_send()
    {
        $user = new User;

        $mock_mailer = $this->createMock(Mailer::class);

        $mock_mailer->expects($this->once())
            ->method('sendMessage')
            ->with($this->equalTo('lotfy@example.com'), $this->equalTo('hello'))
            ->willReturn(true);

        $user->setMailer($mock_mailer);

        $user->email = "lotfy@example.com";


        $this->assertTrue($user->notify('hello'));
    }

    public function test_can_not_notify_user_with_no_email()
    {
        $user = new User;

        $mock_mailer = $this->createMock(Mailer::class);

        $mock_mailer->method('sendMessage')
            ->will($this->throwException(new Exception()));

        $user->setMailer($mock_mailer);

        $this->expectException(Exception::class);

        $user->notify('hello');
    }
}
