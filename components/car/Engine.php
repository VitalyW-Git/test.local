<?php

namespace app\components\car;


class Engine
{
    private $eng;

    function __construct( $eng )
    {
        $this->eng = $eng;
    }
    function setEngine()
    {
        return $this->eng;
    }
}