<?php

use PHPUnit\Framework\TestCase;


class MockTest extends TestCase
{
    public function test_mock()
    {
        $mock = $this->createMock(Mailer::class);

        $mock->method('sendMessage')
            ->willReturn(true);

        $result = $mock->sendMessage('test@example.com', 'Hello');


        $this->assertTrue($result);
    }
}
