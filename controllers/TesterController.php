<?php

namespace app\controllers;


use app\components\kettle\Kettle;
use app\components\kettle\Cup;
use app\models\Book;
use app\models\BookGenre;
use app\models\Gangster;
use app\models\Gun;

use app\models\Player;
use app\models\Team;
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


    public function actionKettle()
    {
        $tea = new Kettle();
        $cup = new Cup();
        $cup->setInCup($tea);
        $cup->pourTeaCup();
        die();
    }


    public function actionGan()
    {
        /*$gangster = Gangster::find()
            ->andWhere(['status'=> Gangster::STATUS_DISABLE ]) // константа прописна в модли
            ->asArray()
            ->all();
*/
// массив с указонными полями
        /*$users = ArrayHelper::toArray($gangster, [
            'app\models\Gangster' => [
                'id',
                'title' => 'name', // изменение ключей массива
                'status',
            ]
        ]);*/
//        $result = ArrayHelper::getColumn($gangster, function ($element) { // получаем значение индекса price
//            return $element['name'];
//        });
//        $userdata = ArrayHelper::index($gangster, 'name', 'status');
//        $result = ArrayHelper::map($gangster, 'name', 'name'); // подставление ключ значение
//        ArrayHelper::multisort($gangster, ['age', 'name'], [SORT_ASC, SORT_DESC]);// возвращает проброшенное значения
//        $result = ArrayHelper::index($gangster, function ($element) {
//            return $element['name'];
//        });

        // вложенные запросы
         $catalog = Gun::find()
            ->select('gangster_id')
            ->andWhere(['gun' => 'Пистолет Кольт']);

        $model1 = Gangster::find()
            ->select('name')
//            ->distinct()
            ->andWhere(['in' ,'id', $catalog])
            ->asArray()
            ->all();
//            ->createCommand()->rawSql; // выводим sql запрос

        // привязка к таблице join
        $model2 = Gangster::find()
            ->select('name')
//            ->distinct()
            ->innerJoin('gun as g', 'gangster.id = g.gangster_id')
            ->andWhere(['g.gun' => 'Пистолет Кольт'])
            ->asArray()
            ->all();

        $model3 = Gangster::find()
            ->select('name')
            ->andWhere(['id' => 4, 'status' => 1])
            ->asArray()
            ->all();

        $model4 = Gangster::find()
            ->select('id, name, age, status') // выводим поля
            ->orderBy(['name' => SORT_DESC])
            ->indexBy('age') // замена индекса
//            ->offset(2) // выбирает все начиная со второй
            ->where(['in', 'id', [5]])
            ->asArray()
            ->all();

        $model5 = Gangster::find()
            ->select('id, name, age, status') // выводим поля
            ->groupBy('status') // групируе значения если они одинаковые
            ->asArray()
            ->all();

        $sql = 'select * from Gangster';
        $model6 = Gangster::findbysql($sql)
            ->asArray()
            ->all();

        $model7 = BookGenre::find()
            ->select('b.name, year, g.name')
//            ->groupBy('name')
            ->join('inner join', 'book as b',  'book_genre.id_book = b.id')
            ->join('inner join', 'genre as g',  'book_genre.id_genre = g.id')
            ->asArray()
//            ->createCommand()->rawSql;
            ->all();

        $model8 = BookGenre::find()
//            ->select('b.name, year, g.name')
//            ->join('book_genre')
            ->join('inner join', 'genre as g',  'book_genre.id_genre = g.id')
            ->asArray()
            ->all();

        $sql = 'select * from gangster where status=:status';
        $model9 = Gangster::findBySql($sql, [':status' => Gangster::STATUS_DISABLE])
            ->asArray()
            ->all();

        //  ?
        $model10 = Book::find()
            ->select('book.*')
            ->leftJoin('book_genre', '`book_genre`.`id_book` = `book`.`id`')
            ->asArray()
            ->with('genres')
            ->all();

        //  ?
        $model12 = Player::find()
            ->select('name, id, team_id')
            ->asArray()
            ->where(['name' => 'петя'])
            ->one();

        $model13 = Team::find()
            ->select('team.name, team.id')
            ->indexBy('id')
            ->asArray()
            ->leftJoin('player as p', 'team.id = p.team_id')
            ->all();
        $model13 = password_hash('root', PASSWORD_DEFAULT);

        debug($model13);
        die();
    }
}