<?php
namespace app\components\hero;



class Hero
{
    private $intelligence = 50;
    private $hand = 10;
    private $protection = 10;
    private $speed = 10;

    private $market;
/** @var Market $market */
    function swayHero( Market $market )
    {
        $this->market = $market;
    }
    function activateHelmet()
    {
        if(!empty($this->market->addHelmet())){
            echo 'Интелект увеличился на ' . $this->market->addHelmet() . '<br>';
        } else {
            echo 'Интелект ' . $this->intelligence . '<br>';
        }
    }

    function activateSword()
    {
        if(!empty($this->market->addSword())){
            echo 'Урон увеличился на ' . $this->market->addSword() . '<br>';
        } else {
            echo 'Урон остался прежний ' . $this->hand . '<br>';
        }
    }

}