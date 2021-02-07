<?php

namespace app\components\car;


class Car
{

    private $car = 'AUDI';
    private $engine;

    function __construct( $engine )
    {
        $this->engine = $engine;
    }
    function getNameCar()
    {
        return $this->car;
    }

    function startEngine()
    {
        return $this->getNameCar() . ' запустила ' . $this->engine->setEngine();
    }
}