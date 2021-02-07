<?php


namespace app\controllers;


use app\models\People;
use app\models\Car;
use yii\data\Pagination;
use yii\web\Controller;
use Yii;

class PeopleController extends Controller
{

    function actionIndex()
    {
//       $usersnativsql = Yii::$app->db->createCommand('SELECT * FROM user')->queryAll();
        $sqlQuery = People::find()->with('cars');
        $pages = new Pagination( ['totalCount' => $sqlQuery->count(), 'pageSize' => 2] );
        $people = $sqlQuery->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('index', [
            'people' => $people,
            'pages' => $pages,
        ]);

    }

}