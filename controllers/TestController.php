<?php

namespace app\controllers;

use app\components\hero\Hero;
use app\components\hero\Market;
use yii\web\Controller;

/** @var Hero */
/** @var Market */

class TestController extends Controller
{

    public function actionIndex()
    {
//
//        /** @var  $gun */
//        $rifle = new Rifle();
//        /** @var  $hunter */
//        $hunter = new Hunter();
//        $hunter->setRifle( $rifle );
//        $hunter->setRifle( $rifle )->shoot();die;
//
//        /** @var  $chalk */
//        $chalk = new Chalk();
//
//        /** @var  $boy */
//        $boy = new Boy();
//        $boy->takeСhalk( $chalk )->draw();die;


//        $fabric = new Tank();
//        echo $fabric->getBody();
//        echo $fabric->getHead();
//        debug($fabric);
//        die();

        $market = new Market();
        $market->helmet(10);
        $market->sword();
        $market->trousers(5);
        $market->horse(30);

        $hero = new Hero();
        $hero->swayHero($market);
        $hero->activateHelmet();
        $hero->activateSword();

        die();

    }
}