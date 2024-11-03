<?php

use PHPUnit\Framework\TestCase;

class FunctionTest extends TestCase
{
    public function test_add_returns_the_correct_sum()
    {
        require 'functions.php';

        $this->assertEquals(4, add(2, 2));
    }

    public function test_add_doesnt_retrun_incorrect_sum()
    {
        $this->assertNotEquals(5, add(2, 2));
    }
}
