<?php

namespace app\components\tank;

class Head
{
    private $head = 'Башня';
    private $instGun;

    /**
     * Head constructor.
     * @param Gun $gun
     */
    function __construct( Gun $gun )
    {
        $this->instGun = $gun;
    }
    function setHead()
    {
        return $this->head;
    }
    function installationGun()
    {
        return $this->instGun->gunHead();
    }
}