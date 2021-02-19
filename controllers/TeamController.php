<?php


namespace app\controllers;


use app\components\CryptoCompareApi;
use app\models\Book;
use app\models\Player;
use app\models\Team;
use app\models\User;
use yii\base\Exception;
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

    /**
     * @param $name
     * @param null $id
     * @throws Exception
     */
    public function actionChangeTeam($name, $id = null)
    {
        Team::changeTeam($name, $id = null);
        die('success');
    }

    public function actionChangePlayerTeam($playerName)
    {
//        $player = Player::find()
//            ->where(['name' => $playerName])
//            ->one();
//
//
//        $team = Team::find()
//            ->where(['name' => $teamName])
//            ->one();

        $model10 = Player::find()
            ->select('player.*')
            ->leftJoin('player.id = team.team_id')
            ->asArray()
            ->where(['in', 'id', $playerName])
            ->createCommand()->rawSql;
//            ->all();
        debug($model10);die();
        if ($teamName !== $team) {
            $team->name = $teamName;
        } else {

        }
    }

}