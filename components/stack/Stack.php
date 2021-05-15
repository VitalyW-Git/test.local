<?php


namespace app\components\stack;


class Stack implements InterStack
{

    /** @var Node */
    public $last;

    public function push($value)
    {
        $this->last = new Node($value, $this->last);
    }

    public function pop()
    {
        if (!$this->last) {
            return null;
        }
        $val = $this->last->value;
        $this->last = $this->last->next;
        return $val;
    }
}