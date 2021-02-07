<?php


namespace app\commands;

use yii\console\Controller;
use app\models\Team;
use app\models\Player;
use yii\console\ExitCode;

class TeamController extends Controller
{

    /**
     * @param array $array
     * @return string
     */
    public function randomVal(array $array): string
    {
        $rand_name = array_rand($array, 1);
        return $array[$rand_name];
    }

    public function actionIndex()
    {
        $club = ['Зенит', 'Динамо', 'Спартак', 'Локомотив'];
        $name = ['Петя', 'Василий', 'Сергей ', 'Георгий'];
        $count = mt_rand(1, 4);
        for ($i = 0; $i < 10; $i++) {
            $team = new Team();
            $team->name = $club[$count];
            $resultSave = $team->save();
            if (!$resultSave) {
                print_r($team->errors);
                exit();
            } else {
                $successUser++;
            }

            $player = new Player();
            $player->team_id = mt_rand(1, 5);
            $player->name = $name[$count];
            $player->age = mt_rand(20, 40);
            $player->rating = mt_rand(1, 10);
            $resultSave = $player->save();
            if (!$resultSave) {
                print_r($player->errors);
                exit();
            }
        }
        echo "добавлено пользователей " . $successUser . PHP_EOL;
        return ExitCode::OK;
    }
}