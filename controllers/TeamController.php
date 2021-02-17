<?php


namespace app\controllers;


use app\models\Player;
use app\models\Team;
use app\models\User;
use yii\data\Pagination;
use yii\web\Controller;

class TeamController extends Controller
{

    /**
     * @param int|null $id
     * @return string
     */
    public function actionIndex(int $id = null)
    {
        if ($id) {
            $player = Player::findOne(['id' => $id]);
            $player->rating++;
            $player->save();
        }

        $sqlQuery = Player::find();
        $pages = new Pagination(['totalCount' => $sqlQuery->count(), 'pageSize' => 4]);
        $players = $sqlQuery->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('index', [
            'players'=> $players,
            'pages' => $pages,
        ]);

    }
}