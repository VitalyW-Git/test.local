<?php

namespace app\modules\test\widgets;

use yii\base\Widget;

class HelloWidget extends Widget
{
    public function run()
    {
        return $this->render('hello');
    }
}