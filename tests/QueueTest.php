<?php

use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase
{

    protected $queue;

    protected function setUp(): void
    {
        $this->queue = new Queue;
    }

    protected function tearDown(): void
    {
        unset($this->queue);
    }


    public function test_new_queue_is_empty()
    {
        $this->assertEquals(0, $this->queue->getCount());
    }



    public function test_item_is_added_in_the_queue()
    {
        $this->queue->push('green');

        $this->assertEquals(1, $this->queue->getCount());
    }



    public function test_item_is_removed_from_the_queue()
    {
        $this->queue->push('green');
        $item = $this->queue->pop();

        $this->assertEquals(0, $this->queue->getCount());
        $this->assertEquals('green', $item);
    }

    public function test_an_item_is_removed_from_the_queue()
    {
        $this->queue->push('green');
        $this->queue->push('red');

        $this->assertEquals('green', $this->queue->pop());
    }
}
