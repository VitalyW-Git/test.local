<?php

namespace app\components;

use app\models\CryptoForm;
use yii\httpclient\Client;

class CryptoCompareApi
{
    /** @var $url string */
    private $url; // сервис

    /** @var $fsym string */
    private $fsym;
    private $tsyms;

    public function __construct(CryptoForm $cryptoForm)
    {
        $this->url = \Yii::$app->params['cryptoCompareApi']['url'];
        $this->fsym = $cryptoForm->altcoin;
        $this->tsyms = implode(',', $cryptoForm->currencys);  //'RUB','USD', 'EUR'
    }

    public function getData()
    {
        $client = new Client();
        $response = $client->createRequest()
            ->setMethod('GET')
            ->setUrl($this->url)
            ->setData(['fsym' => $this->fsym, 'tsyms' => $this->tsyms])
            ->send();

        if ($response->isOk) {
            $data = $response->data;
        }

        return $data ?? [];
    }
}