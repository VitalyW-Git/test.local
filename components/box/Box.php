<?php

namespace app\components\box;


class Box
{
    private $chalk;

    /**
     * @param Chalk $chalk
     */
    public function setChalkBox(Chalk $chalk)
    {
        $this->chalk = $chalk;
    }

    public function Show()
    {
        return $this->chalk;
    }

    public function boxShow()
    {

    }
}