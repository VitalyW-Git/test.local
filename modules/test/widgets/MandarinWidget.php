<?php

namespace app\modules\test\widgets;

use yii\base\Widget;

class MandarinWidget extends  Widget
{
    /** @var array ['k'=>'v', 'k2'=>'v2'] */
    public $mandarinList = [];

    // установить параметры по умолчанию
    public function init()
    {
        parent::init();
        if (!$this->mandarinList) {
            $this->mandarinList = ['mandarin obishnii' => ['/site/index']];
        }
    }

    public function run()
    {
        return $this->render('mandarin', ['mandarinList' => $this->mandarinList]);
    }
}