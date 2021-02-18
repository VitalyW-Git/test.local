<?php

namespace app\components\kettle;


class Cup
{
    /** @var Kettle $kettle string|false */
    public $empty = false;

    public function setInCup( Kettle $tea = null )
    {
       $this->empty = $tea;
    }

    public function getTeaCup()
    {
        if(empty($this->empty)){
            echo 'Кружка пустая! НАЛЕЙ ЧАЯ!';
        } else {
            echo  'Кружка ' . $this->empty->getTea();
        }
    }

    public function pourTeaCup()
    {
        return $this->getTeaCup();
    }
}