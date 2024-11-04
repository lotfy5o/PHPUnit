<?php

use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertEquals;

class QueueTest extends TestCase
{

    protected  $queue;

    protected function setUp(): void
    {
        $this->queue = new Queue;
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

    public function test_max_number_of_item_can_be_added()
    {
        for ($i = 0; $i < Queue::MAX_ITEMS; $i++) {
            $this->queue->push($i);
        }

        assertEquals(Queue::MAX_ITEMS, $this->queue->getCount());
    }

    public function test_exception_thrown_when_adding_an_item_to_a_full_queue()
    {
        // add five elements to the queue
        for ($i = 0; $i < Queue::MAX_ITEMS; $i++) {
            $this->queue->push($i);
        }

        $this->expectException(QueueException::class);

        $this->expectExceptionMessage("Queue is full");

        $this->queue->push("one last element");
    }
}
