<?php

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{

    public function test_add_two_plus_two_result_in_four()
    {
        // 4 is the expected value, 2 + 2 is the actual value. 
        $this->assertEquals(4, 2 + 2);
    }
}
