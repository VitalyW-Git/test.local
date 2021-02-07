<?php

namespace app\controllers;

use app\components\tank\Factory;
use app\components\tank\Tank;
use yii\web\Controller;


class TestController extends Controller
{

    public function actionIndex()
    {

        /** @var  $gun */
//        $rifle = new Rifle();
        /** @var  $hunter */
//        $hunter = new Hunter();
//        $hunter->setRifle( $rifle );
//        $hunter->setRifle( $rifle )->shoot();die;

        /** @var  $chalk */
//        $chalk = new Chalk();

        /** @var  $boy */
//        $boy = new Boy();
//        $boy->takeСhalk( $chalk )->draw();die;


        $fabric = new Tank();
        echo $fabric->getBody();
        echo $fabric->getHead();
        debug($fabric);
        die();

    }
}