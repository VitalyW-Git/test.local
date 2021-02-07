<?php


namespace app\controllers;

use app\models\Team;
use yii\web\Controller;

class TeamController extends Controller
{
    public function actionIndex()
    {
        /** @var  $users */
        $teams = Team::find()->all();
//        print_r($users);die();
        return $this->render('index', ['teams' => $teams] );
    }

}