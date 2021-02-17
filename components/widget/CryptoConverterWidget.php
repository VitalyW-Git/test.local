<?php

namespace app\components\widget;

use app\models\CryptoForm;
use yii\base\Widget;

class CryptoConverterWidget extends Widget
{
    /** @var $data array*/
    public $data;

    /** @var CryptoForm $cryptoForm*/
    public $cryptoForm;

    public function run()
    {
        return $this->render('crypto-summa', [
            'data' => $this->data,
            'cryptoForm' => $this->cryptoForm,
        ]);
    }
}