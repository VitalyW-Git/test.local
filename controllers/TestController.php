<?php

namespace app\controllers;

use app\components\box\Box;
use app\components\box\Green;
use app\components\box\Red;
use app\components\box\Yellow;
use yii\web\Controller;


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

//        $market = new Market();
//        $market->helmet(10);
//        $market->sword();
//        $market->trousers(5);
//        $market->horse(30);
//
//        $hero = new Hero();
//        $hero->swayHero($market);
//        $hero->activateHelmet();
//        $hero->activateSword();
//
//        die();
    }

    public function actionHero()
    {
//        $sword = new Sword();
//        $horse = new Horse();
//        $hero = new Hero();
//        $hero->setSword($sword);
//        $hero->setHorse($horse);
//        $hero->ride();
//        $hero->swordAttack();
//
//        die;
    }

    public function actionBox()
    {
        $red = new Red();
        $box = new Box();
        $box->setChalkBox($red);
        $box->Show();


        die();
    }
}