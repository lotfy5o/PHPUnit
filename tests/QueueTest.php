<?php

use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase
{

    protected static $queue;

    protected function setUp(): void
    {
        static::$queue->clear();
    }

    public static function setUpBeforeClass(): void
    {
        static::$queue = new Queue;
    }

    public static function tearDownAfterClass(): void
    {
        static::$queue = null;
    }




    public function test_new_queue_is_empty()
    {
        $this->assertEquals(0, static::$queue->getCount());
    }



    public function test_item_is_added_in_the_queue()
    {
        static::$queue->push('green');

        $this->assertEquals(1, static::$queue->getCount());
    }



    public function test_item_is_removed_from_the_queue()
    {
        static::$queue->push('green');
        $item = static::$queue->pop();

        $this->assertEquals(0, static::$queue->getCount());
        $this->assertEquals('green', $item);
    }

    public function test_an_item_is_removed_from_the_queue()
    {
        static::$queue->push('green');
        static::$queue->push('red');

        $this->assertEquals('green', static::$queue->pop());
    }
}
