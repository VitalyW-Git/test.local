<?php

namespace app\controllers;

use app\models\User;
use app\models\UserForm;
use app\models\UserSearch;
use yii\base\BaseObject;
use yii\data\Pagination;
use yii\debug\models\timeline\DataProvider;
use yii\web\Controller;
use Yii;
use yii\web\Response;

class UserController extends Controller
{
    //связь один к одному
    function actionIndex()
    {
//       $usersnativsql = Yii::$app->db->createCommand('SELECT * FROM user')->queryAll();
        $sqlQuery = User::find()->with('passport');
        $pages = new Pagination( ['totalCount' => $sqlQuery->count(), 'pageSize' => 4] );
        $users = $sqlQuery->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('index', [
            'users' => $users,
            'pages' => $pages,
        ]);
    }

    // SQL запрос, изменеие url '/contact' => 'user/test-user'
    function actionTestUser()
    {
//      $nameList = ['Петя', 'Георгий'];
//      $users = User::find()->andWhere( ['name'=> $nameList] )->orderBy( ['salary' => SORT_DESC, 'name' => SORT_ASC] )->asArray()->all();
//        $nameList = ['Петя', 'Георгий'];
//      $users = User::find()->groupBy('age')->createCommand()->rawSql;
//        $users = User::find()->orderBy('age ASC')->limit(5)->All();
        $db = \Yii::$app->db;
        $id = 100;
        $sql = 'select * from user where id = :id';
        $records = $db->createCommand($sql)->bindValues([':id' => $id])->queryAll();
        return $this->render('test-user', ['users' => $records] );
    }

    // добавление пользователя в базу данных
    function actionCreate()
    {
        $model = new User();
        $request = Yii::$app->request;
        if ($model->load($request->post()) && $model->validate()) {
//        if ($model->load($_POST['User']) && $model->validate()) {
            $model->save();
            \Yii::$app->getSession()->setFlash('success', 'Запись добавлена');
            return $this->refresh();
        }
        return $this->render('create', ['model' => $model]);
    }

    // формирование таблицы с колонками поиска
    function actionSearch()
    {
//        $params = Yii::$app->request->queryParams; // объект
        $userSearch = new UserSearch();
        $dataProvider = $userSearch->search(Yii::$app->request->queryParams);
        return $this->render('search', [
            'dataProvider' => $dataProvider,
            'userSearch' => $userSearch,
            ]
        );
    }

    function actionSearchNew(): string
    {
        $userSearch = new UserSearch();
        $dataProvider = $userSearch->searchNew(Yii::$app->request->queryParams);
        return $this->render('search-new', [
                'dataProvider' => $dataProvider,
                'userSearch' => $userSearch,
            ]
        );
    }


}