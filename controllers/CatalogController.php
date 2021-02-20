<?php

namespace app\controllers;

use app\models\CatalogOrder;
use app\models\CatalogOrderItems;
use yii\web\Controller;

class CatalogController extends Controller
{
    public function actionIndex($userId = 3)
    {
        $catalogOrders = CatalogOrder::find()
            ->where(['user_id' => $userId])
            ->all();

        return $this->render('index', [
            'catalogOrders' => $catalogOrders
        ]);
    }
}
