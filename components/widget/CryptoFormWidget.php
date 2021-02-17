<?php

namespace app\components\widget;

use app\models\CryptoForm;
use yii\base\Widget;

class CryptoFormWidget extends Widget
{
    /** @var CryptoForm $cryptoForm*/
    public $cryptoForm;

    public function run()
    {
        return $this->render('crypto-form', ['cryptoForm' => $this->cryptoForm]);
    }
}