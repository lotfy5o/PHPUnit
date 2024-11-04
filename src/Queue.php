<?php

class Queue
{

    public const MAX_ITEMS = 5;

    protected $items = [];

    public function push($item)
    {
        if ($this->getCount() == self::MAX_ITEMS) {
            throw new QueueException("Queue is full");
        }
        $this->items[] = $item;
    }

    public function pop()
    {
        return array_shift($this->items);
    }

    public function getCount()
    {
        return count($this->items);
    }

    // clear the queue
    public function clear()
    {
        $this->items = [];
    }
}
