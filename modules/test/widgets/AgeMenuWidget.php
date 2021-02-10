<?php

namespace app\modules\test\widgets;

use yii\base\Widget;

class AgeMenuWidget extends Widget
{
    public function run()
    {
        return $this->render('hello');
    }
}