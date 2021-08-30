<?php

namespace app\components;

use app\models\CryptoForm;
use Asil\VkMarket\VkConnect;
use Asil\VkMarket\VkServiceDispatcher;
use yii\base\Component;

class ConnectVkApi extends Component
{


    public $token = 'b142cd1006c6382ec59cf50aff087d9f93c45f87a7641d18c557e0ce8772ac74fbf840b54165fd647d412'; //
    public $confirmationToken = '03151b3e';

    public $accessToken = '';
    public $groupId = '';
    public $ownerId = '';

    public function __construct()
    {
        $connect = new VkConnect($this->accessToken, $this->groupId, $this->ownerId);
        $vkService = new VkServiceDispatcher($connect);
    }

}
// id приложения client_id=7937053
// https://oauth.vk.com/authorize?client_id=7937053&display=page&redirect_uri=https://oauth.vk.com/blank.html&scope=market,offline&response_type=token&v=5.52

// https://oauth.vk.com/blank.html#access_token=95c20093f7bf14dabd9e68d74093fa27ed686afebccd7d9ca8786a468e2c576fc6d2d30189bb879debb70&expires_in=0&user_id=542194903

// доступ к товарам https://oauth.vk.com/blank.html#access_token=84d88919d4e3c75fce8a53144fa59a4ca85428d6ed6f0ee7770c709ea399ffa6f2946b9944305fa27f625&expires_in=0&user_id=542194903

// https://oauth.vk.com/authorize?client_id=7937053&display=page&redirect_uri=https://oauth.vk.com/blank.html&scope=photos,docs,pages,status,groups,notifications,stats,market,offline&response_type=token&v=5.199