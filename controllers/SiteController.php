<?php

namespace app\controllers;

use app\models\Gun;
use app\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    // отключаем проверку токена
    public function beforeAction($action)
    {
        if (in_array($action->id, ['index'])) {
            $this->enableCsrfValidation = false;
        }
        //можно вывести ошибку
        Yii::$app->session->setFlash('danger', 'Text');
        return parent::beforeAction($action);
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $users = User::find()->limit('5')->all();
        $guns = Gun::find()->all();
        return $this->render('index', [
            'users' => $users,
            'guns' => $guns,
        ]);
    }


    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $data = [
            'ContactForm' => [
                'name' => 'Rom',
                'email' => 'test@yandex.ru',
                'subject' => 'fdgfdg',
                'body' => 'dsfsd',
                'verifyCode' => 'vCode'
            ]
        ];

        $simpleData = [
            'name' => 'Rom',
            'email' => 'test@yandex.ru',
            'subject' => 'fdgfdg',
            'body' => 'dsfsd',
            'verifyCode' => 'vCode'
        ];


        $model = new ContactForm();
//        $model->load($data, 'ContactForm');
//        $model->attributes;
//        $data = \Yii::$app->request->post('ContactForm', []);
//        $model->attributes = $simpleData;
//        debug($model);die();
//        $model->scenario = ContactForm::NAME_NO_VALIDATION; //сценарий для формы, переопределение полей
//        $model->scenario = ContactForm::ONLY_NAME;

        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');
            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
