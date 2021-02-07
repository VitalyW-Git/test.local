<?php


namespace app\components\tank;

class Gun
{
    private $gun = 'Пушка калибр 125 мм.';

    function gunHead(): string
    {
        return $this->gun;
    }
}