<?php

namespace app\components\box;


class Box
{
    private $yellow;

    /** @var RedChalk */
    private $red;

    private $green;

    /**
     * Установить желтый мел
     *
     * @param Yellow $yellow
     */
    public function setChalkYellow(Yellow $yellow): void
    {
        $this->yellow = $yellow;
    }

    public function setChalkRed(RedChalk $red)
    {
        $this->red = $red;
    }

    public function setChalkGreen(Green $green)
    {
        $this->green = $green;
    }

   /* public function boxShow()
    {
        $this->yellow->getYellow() . $this->red->getRed() . $this->green->getGreen();
    }*/

    /*public function takeRedChalk()
    {
        $this->red->getRed();
    }*/

    /*public function drawLineRedChalk()
    {
        echo 'Линия нарисована ' . $this->red->getRed() . 'мелом!';
    }*/

    public function getRedChalk()
    {
        return $this->red;
    }

    public function boxShow()
    {
                var_dump($this->red);
        //        var_dump($this->green);
        //        var_dump($this->yellow);

        echo 'In box we have ';
        echo $this->red->getColor();
       // echo $this->green->getColor();
       // echo $this->red->getColor();
    }
}