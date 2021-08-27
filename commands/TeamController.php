<?php


namespace app\commands;

use Exception;
use yii\console\Controller;
use app\models\Team;
use app\models\Player;
use yii\console\ExitCode;
use yii\httpclient\Client;

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

    public function actionVk()
    {
//        $token = '95c20093f7bf14dabd9e68d74093fa27ed686afebccd7d9ca8786a468e2c576fc6d2d30189bb879debb70';
        $token = '84d88919d4e3c75fce8a53144fa59a4ca85428d6ed6f0ee7770c709ea399ffa6f2946b9944305fa27f625';
        $url = 'https://api.vk.com/method/market.add?owner_id=-20618894&main_photo_id=457306881&name=testing&description=testingProduct&price=100&category_id=1&access_token='.$token.'&v=5.131';

        $client = new Client();
        $response = $client->createRequest()
            ->setMethod('GET')
            ->setUrl($url)
            ->setOptions(['timeout' => 3])
            ->send();

        $arrResponse = $response->data;
        print_r($arrResponse);
        if ($arrResponse['ok'] === false) {
            throw new Exception($arrResponse['description'] . ' ' . $arrResponse['error_code']);
        }
    }
}