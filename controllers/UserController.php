<?php


namespace app\controllers;

use app\models\common\User;
use yii\rest\ActiveController;

class UserController extends ActiveController
{
    public $modelClass = User::class;
}