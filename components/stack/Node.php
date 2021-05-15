<?php

namespace app\components\stack;

class Node
{
    /** @var Node */
    public $next;

    /** @var string */
    public $value;

    public function __construct(string $value, Node $next = null)
    {
        $this->value = $value;
        $this->next = $next;
    }
}