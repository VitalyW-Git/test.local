<?php

namespace app\components\hero;

class Market
{
    private $helmet;
    private $sword;
    private $trousers;
    private $horse;

    function helmet( $helmet = null )
    {
        $this->helmet = $helmet;
    }
    function sword( $sword = null  )
    {
        $this->sword = $sword;
    }
    function trousers( $trousers = null  )
    {
        $this->trousers = $trousers;
    }
    function horse( $horse = null  )
    {
        $this->horse = $horse;
    }

    function addHelmet()
    {
        return $this->helmet;
    }
    function addSword()
    {
        return $this->sword;
    }
    function addTrousers( )
    {
        return $this->trousers;
    }
    function addHorse()
    {
        return $this->horse;
    }
}