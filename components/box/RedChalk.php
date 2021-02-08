<?php

namespace app\components\box;


class RedChalk
{
    private $color = 'red';

    /*public function getRed()
    {
        echo $this->red;
    }*/

    public function draw()
    {
        echo 'Draw '. $this->color;
    }

    public function getColor()
    {
        return $this->color;
    }
}