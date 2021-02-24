<?php

namespace app\controllers;

use app\models\Catalog;
use app\models\CatalogOrder;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class CatalogController extends Controller
{
    public function actionIndex()
    {
        $catalogOrders = CatalogOrder::find()
            ->all();
        return $this->render('index', [
            'catalogOrders' => $catalogOrders
        ]);
    }

    public function actionOrder()
    {
//        $id = \Yii::$app->request->get();
        $catalogsId = Catalog::find()
            ->from('catalog as c')
            ->innerJoin('catalog_order_items as coi', 'c.id = coi.catalog_id')
//            ->innerJoin('catalog_order_items as coi', 'c.id = coi.catalog_id')
            ->where(['coi.catalog_order_id' => 1])
            ->asArray()
            ->all();
        debug($catalogsId);
        die();
        return $this->render('order', [
            'catalogsId' => $catalogsId
        ]);
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
