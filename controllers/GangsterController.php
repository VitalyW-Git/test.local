<?php

namespace app\controllers;

use app\models\Gangster;
use app\models\GangsterSearch;
use yii\data\Pagination;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use Yii;

/** @var Gangster[] $gangsters */
class GangsterController extends Controller
{
    public function actionIndex()
    {
//        $sqlQuery = Gangster::find()->with('gun');
//        $pages = new Pagination( ['totalCount' => $sqlQuery->count(), 'pageSize' => 2] );
//        $gangsters = $sqlQuery->offset($pages->offset)->limit($pages->limit)->all();
////        debug($gangsters);die();
//        return $this->render('index', [
//            'gangsters' => $gangsters,
//            'pages' => $pages,
//        ]);
        $gangsterSearch = new GangsterSearch();
        $dataProvider = $gangsterSearch->search(Yii::$app->request->queryParams);
        return $this->render('index', [
                'dataProvider' => $dataProvider,
                'gangsterSearch' => $gangsterSearch,
            ]
        );
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'gangster' => $this->findModel($id),
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Gangster::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public static function getlistStatus()
    {
        $status = Gangster::find()->groupBy(['status'])->all(); // выбор без павтора
        $status = ArrayHelper::map($status, 'id', 'status'); // приводим к формату выпадающего списка

        return $status;
    }
}