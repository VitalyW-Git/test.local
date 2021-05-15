<?php

namespace app\components\magic;

class Magic
{
    private $name = 'AAAAA';
    private $props = [];

    public function __set(string $name, $value): void
    {
        $this->props[$name] = $value;
    }

    public function __get(string $name)
    {
        if (array_key_exists($name, $this->props)) {
            return $this->props[$name];
        }
        return 'non';
    }

    public function __call($name, $arguments)
    {
        // TODO: Implement __call() method.
    }


}