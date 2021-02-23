<?php

namespace app\controllers;

use app\models\Catalog;
use app\models\CatalogOrder;
use app\models\CatalogOrderItems;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class CatalogController extends Controller
{
    public function actionIndex()
    {
        $catalogOrders = CatalogOrder::findOne('id');
        return $this->render('index', [
            'catalogOrders' => $catalogOrders
        ]);
    }

    public function actionOrderAll($catalogId)
    {
        $orders = Catalog::find()
            ->joinWith('Catalog as c')
            ->where(['c.'])
            ->all();
        debug($orders);
        die();
    }

//    public function actionIndex($userId)
//    {
//        $catalogOrders = $this->findModel($userId);
//        return $this->render('index', [
//            'catalogOrders' => $catalogOrders
//        ]);
//    }

    protected function findModel($userId)
    {
        $model = CatalogOrder::find()
            ->where(['user_id' => $userId])
            ->all();
        if ($model != null) {
            return $model;
        } else {
            throw new NotFoundHttpException('Переданы не правельные параметры!!');
        }
    }
}
