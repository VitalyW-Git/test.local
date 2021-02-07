<?php

namespace app\components\tank;


class Tank
{
    private $body;
    private $head;
    function __construct()
    {
        $gun = new Gun;
        $this->head = new Head( $gun );
        $this->body = new Body;
    }

    function getBody()
    {
        return $this->body->setBody();
    }
    function getHead()
    {
        return $this->head->setHead();
    }
}