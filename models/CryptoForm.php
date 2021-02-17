<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class CryptoForm extends Model
{
    /** @var $altcoin string */
    public $altcoin;
    /** @var $currencys array */
    public $currencys;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            ['altcoin', 'string'],
            ['currencys', 'safe'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'altcoin' => 'ALRCOIN',
            'currencys' => 'ВАЛЮТА',
        ];
    }
    public static function getAltcoinList():array
    {
        return [
            'BTC' => 'BTC',
            'ETH' => 'ETH',
            'LTC'=>'LTC'
        ];
    }
    public static function getCarensisList():array
    {
        return [
            'RUB' => 'RUB',
            'USD' => 'USD',
            'EUR'=>'EUR'
        ];
    }

}
