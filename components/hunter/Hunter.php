<?php

namespace app\components\hunter;


class Hunter
{
    private $addRifle;

    /**
     * Hunter constructor.
     * @param Rifle|null $addRifle
     */
    public function __construct( Rifle $addRifle = null )
    {
        $this->addRifle = $addRifle;
    }

    /**
     * @param Rifle addRifle
     * @return $this
     */
    public function setRifle( Rifle $addRifle )
    {
        $this->addRifle = $addRifle;
        return $this;
    }

    public function shoot()
    {
        return $this->addRifle->getRifle();
    }


}