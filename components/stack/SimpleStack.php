<?php

namespace app\components\stack;

class SimpleStack implements InterStack
{
    /** @var array */
    public $items;

    public function push($item)
    {
        $this->items[] = $item;
    }

    public function pop()
    {
        return array_pop($this->items);
    }
}