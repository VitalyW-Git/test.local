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
        $token = '909382e335d496dfcd690e19dab20e2c8e02e8200fd93419bb786c3fdace20eefb44316e22c5a69683d1a';
//        $token = '84d88919d4e3c75fce8a53144fa59a4ca85428d6ed6f0ee7770c709ea399ffa6f2946b9944305fa27f625';
        $idApp = '20618894';
        $url = 'https://api.vk.com/method/market.add?owner_id=-'.$idApp.'&main_photo_id=457302222&name=testing&description=testTestTestTestTest&category_id=902&access_token='.$token.'&v=5.132';
        $getProduct = 'https://api.vk.com/method/market.get?owner_id=-'.$idApp.'&album_id=20&count=2&access_token='.$token.'&v=5.125';
        $addProduct = 'https://api.vk.com/method/market.addToAlbum?owner_id=-'.$idApp.'&item_id=3201083&album_ids=20&access_token='.$token.'&v=5.131';

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

    // file_get_contents
    public function actionTakeToken()
    {
        $permissions = [
            'notify',
            'friends',
            'photos',
            'audio',
            'video',
            'docs',
            'notes',
            'pages',
            'status',
            'wall',
            'groups',
            'messages',
            'email',
            'notifications',
            'stats',
            'ads',
            'market',
            'offline',
            ];

        $requestParams = [
            'client_id' => '7937053',
            'display' => 'page',
            'redirect_uri' => 'https://oauth.vk.com/blank.html',
            'response_type' => 'token',
            'scope' => implode(',', $permissions),
            'v' => '5.164',
        ];

        $url = 'https://oauth.vk.com/authorize?'.http_build_query($requestParams);
        echo $url;
    }
}

https://oauth.vk.com/authorize?client_id=7937053&display=page&redirect_uri=https%3A%2F%2Foauth.vk.com%2Fblank.html&response_type=token&scope=notify%2Cfriends%2Cphotos%2Caudio%2Cvideo%2Cdocs%2Cnotes%2Cpages%2Cstatus%2Cwall%2Cgroups%2Cmessages%2Cemail%2Cnotifications%2Cstats%2Cads%2Cmarket%2Coffline&v=5.164
