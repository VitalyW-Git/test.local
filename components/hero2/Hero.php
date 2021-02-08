<?php

namespace app\components\hero2;

class Hero
{
    private $sword;
    private $horse;
    private $speed = 5;
    private $hit = 2;

    public function setSword($sword)
    {
        $this->sword = $sword;
    }

    public function setHorse($horse)
    {
        $this->horse = $horse;
    }

    public function go()
    {
        echo 'Идёт пишком скорость ' . $this->speed;
    }

    public function ride()
    {
        if ($this->horse) {
            echo 'Едет на лошоди ' . ($this->horse->getSpeed() + $this->speed);
        } else {
            $this->go();
        }
    }

    public function hitHand()
    {
        echo 'Нанесён урон ' . $this->hit;
    }

    public function swordAttack()
    {
        if ($this->sword) {
            echo 'Атакует мечом ' . ($this->sword->getDamage() + $this->hit);
        } else {
            $this->hitHand();
        }
    }


}