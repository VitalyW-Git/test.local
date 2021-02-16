<?php

namespace app\controllers;

use app\components\widget\UserOrderWidget;
use app\models\Passport;
use app\models\User;
use app\models\UserForm;
use app\models\UserOrder;
use app\models\UserSearch;
use yii\data\Pagination;
use yii\debug\models\timeline\DataProvider;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use Yii;
use yii\web\Response;

class UserController extends Controller
{

    // отключаем проверку токена
    public function beforeAction($action)
    {
        if (in_array($action->id, ['order-ajax'])) {
            $this->enableCsrfValidation = false;
        }
        return parent::beforeAction($action);
    }

    //связь один к одному
    function actionIndex()
    {
//       $usersnativsql = Yii::$app->db->createCommand('SELECT * FROM user')->queryAll();
        $sqlQuery = User::find()->with('passport');
        $pages = new Pagination(['totalCount' => $sqlQuery->count(), 'pageSize' => 4]);
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
        return $this->render('test-user', ['users' => $records]);
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

    public static function getlistName()
    {
        $neme = User::find()->groupBy(['name'])->all(); // выбор без павтора
        $neme = ArrayHelper::map($neme, 'id', 'name'); // приводим к формату выпадающего списка
        return $neme;
//        $parents = User::find()
//            ->select(['c.id', 'c.name'])
//            ->join('JOIN', 'passport c', 'passport.user_id = c.id')
//            ->distinct(true)
//            ->all();
//
//        return ArrayHelper::map($parents, 'id', 'name');
    }

    // создание одного пользователя
    public function actionView($id)
    {
//        $user = User::find()->with('passport')->where(['id' => $id])->one();
        return $this->render('view', [
            'user' => $this->findModel($id),
        ]);
    }

    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    //вывод пользователей с рдним возростом
    public function actionAge($age = null) // передаём параметр запроса
    {
        $users = User::find()->where(['age' => $age])->all();
        return $this->render('age', [
            'users' => $users,
        ]);
    }

    public function actionA()
    {
        $users = User::find()->successful()->allder()->all();
        $a = 1;
    }

    public function actionOrder($id)
    {
        $order = new UserOrder();
        $order->price = mt_rand(50000, 80000);
        $order->gangster_id = mt_rand(2, 10);
        $order->user_id = $id;
        $order->save();
        return $this->redirect(['/user/search']);
    }

    public function actionOrderAjax() //при get запросе перелаём id в action
    {
        Yii::$app->response->format = Response::FORMAT_JSON; // тип ответа FORMAT_JSON
        $success = true;
        $error = null;
        $id = Yii::$app->request->post('id');
        $order = new UserOrder();
        $order->price = mt_rand(50000, 80000);
        $order->gangster_id = mt_rand(2, 10);
        $order->user_id = $id;
        if(!$order->save()){
            $firstErrorAsArray = $order->firstErrors;
            $firstKey = array_key_first($firstErrorAsArray);
            $error = $firstErrorAsArray[$firstKey];
            $success = false;
        }

        return [
            'error' => $error,
            'success' => $success,
            'view' => UserOrderWidget::widget(),
        ];

    }

    public function actionDelete($id)
    {
        Yii::$app->response->format = Response::FORMAT_JSON; // тип ответа FORMAT_JSON
        $success = true;
        $error = null;

        /** @var User $user */
        $user = User::find()->where(['id' => $id])->one();
        if(!$user->delete()){
            $firstErrorAsArray = $user->firstErrors;
            $firstKey = array_key_first($firstErrorAsArray);
            $error = $firstErrorAsArray[$firstKey];
            $success = false;
        }

        return [
            'error' => $error,
            'success' => $success,
            'view' => UserOrderWidget::widget(),
        ];
    }

}