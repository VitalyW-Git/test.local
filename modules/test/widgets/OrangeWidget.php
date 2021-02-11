<?php

namespace app\modules\test\widgets;

use yii\base\Widget;

class OrangeWidget extends Widget
{
    /** @var array ['k'=>'v', 'k2'=>'v2'] */
    public $orangeArray = [];

    // установить параметры по умолчанию
    public function init()
    {
        parent::init();
        if (!$this->orangeArray) {
            $this->orangeArray = ['orangeList obishnii' => ['/site/index']];
        }
    }

    public function run()
    {
        return $this->render('orange', ['orangeArray' => $this->orangeArray]);
    }
}