<?php

namespace app\controllers;

use app\components\widget\UpdateGangsterDataWidget;
use app\models\Gangster;
use app\models\GangsterSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use Yii;
use yii\web\Response;

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




    public function actionStatus($id)
    {
        Yii::$app->response->format = Response::FORMAT_JSON; // тип ответа FORMAT_JSON
        $success = true;
        $error = null;

        /** @var Gangster $gangster */
        $gangster = Gangster::find()->where(['id' => $id])->one();

        $gangster->status = (int)(!$gangster->status);

        if(!$gangster->save()){
            $firstErrorAsArray = $gangster->firstErrors;
            $firstKey = array_key_first($firstErrorAsArray);
            $error = $firstErrorAsArray[$firstKey];
            $success = false;
        }

        return [
            'error' => $error,
            'success' => $success,
            'view' => $gangster,
        ];
    }

    /**
     * @param $id
     * @return array
     * @throws \Exception
     */
    public function actionUpdateGangster($id)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $success = true;
        $error = null;

        /** @var Gangster $gangster */
        $gangster = Gangster::find()->where(['id' => $id])->one();

        $gangster->name = $gangster->name .  ' ' . '!';
        $gangster->age = $gangster->age + 1;
        $gangster->status = (int)(!$gangster->status);

        if(!$gangster->save()){
            $firstErrorAsArray = $gangster->firstErrors;
            $firstKey = array_key_first($firstErrorAsArray);
            $error = $firstErrorAsArray[$firstKey];
            $success = false;
        }

        return [
            'error' => $error,
            'success' => $success,
            'html' => UpdateGangsterDataWidget::widget([
                'gangster' => $gangster
            ]),
        ];
    }
}