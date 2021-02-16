<?php

namespace app\components\widget;

use app\models\Gangster;
use yii\base\Widget;

class UpdateGangsterDataWidget extends Widget
{
    /** @var Gangster*/
    public $gangster;

    public function run()
    {
        return $this->render('update-gangster-data', ['gangster' => $this->gangster]);
    }
}