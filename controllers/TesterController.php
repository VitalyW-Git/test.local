<?php

namespace app\controllers;


use app\models\Gangster;
use yii\helpers\ArrayHelper;
use yii\web\Controller;


class TesterController extends Controller
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
//        $red = new Red();
//        $box = new Box();
//        $box->setChalkBox($red);
//        $box->Show();
//
//
//        die();
    }
    public function actionGan()
    {
        $gangster = Gangster::find()
//            ->andWhere(['status'=> Gangster::STATUS_DISABLE ])
            ->all();

        $users = ArrayHelper::toArray($gangster, [
            'app\models\Gangster' => [
                'id',
                'name',
                'status'
            ]
        ]);

//        $result = ArrayHelper::getColumn($gangster, function ($element) { // получаем значение индекса price
//            return $element['name'];
//        });
//        $userdata = ArrayHelper::index($gangster, 'name', 'status');
//        $result = ArrayHelper::map($gangster, 'name', 'name'); // подставление ключ значение
//        ArrayHelper::multisort($gangster, ['age', 'name'], [SORT_ASC, SORT_DESC]);// возвращает проброшенное значения
//        $result = ArrayHelper::index($gangster, function ($element) {
//            return $element['name'];
//        });
        debug($users);
        die();
    }
}