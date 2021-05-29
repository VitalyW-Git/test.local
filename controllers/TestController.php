<?php
namespace app\controllers;

use app\components\singleton\App;
use app\components\stack\Stack;
use yii\helpers\BaseVarDumper;
use yii\web\Controller;


class TestController extends Controller
{

    public function actionIndex()
    {

        $stack = new Stack();

        $stack->push('a');
        $stack->push('b');
//        $stack->push('c');
        $stack->pop();
//        $stack->push('d');
        debug($stack);
        BaseVarDumper::dump($stack,10,true);

        die();
    }

    public function actionSingl()
    {
        $app  = App::getInstance();
        $app->name = 'Str';
        $app2 = App::getInstance();
        BaseVarDumper::dump($app2,true);
        die();
    }
}