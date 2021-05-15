<?php

namespace app\components\stack;

interface InterStack
{
    public function push($item);

    public function pop();
}