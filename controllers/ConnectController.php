<?php

namespace app\controllers;

use app\components\ConnectVkApi;
use yii\web\Controller;

class ConnectController extends Controller
{
    public function actionTokenData()
    {
        if (!isset($_REQUEST)) {
            return;
        }
        $data = \Yii::$app->request->post();
        $con = new ConnectVkApi();

    }
}