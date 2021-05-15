<?php

namespace app\components\singleton;

class App
{

    /** @var App */
    private static $instance;

    /** @var string */
    public $name = 'Vit';

    private function __construct()
    {

    }

    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    private function __wakeup()
    {
        // TODO: Implement __wakeup() method.
    }

    public static function getInstance(): App
    {
        if(!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

}