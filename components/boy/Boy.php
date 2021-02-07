<?php

namespace app\components\boy;


class Boy
{
    private $chalk;
    /**
     * @param Chalk $chalk
     * @return $this
     */
    public function takeСhalk( Chalk $chalk )
    {
        $this->chalk = $chalk;
        return $this;
    }

    public function draw()
    {
        return $this->chalk->drawLine();
    }
}