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
}
