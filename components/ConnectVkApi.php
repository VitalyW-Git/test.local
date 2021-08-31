<?php

namespace app\components;

use app\models\CryptoForm;
use Asil\VkMarket\VkConnect;
use Asil\VkMarket\VkServiceDispatcher;
use yii\base\Component;

class ConnectVkApi extends Component
{
    public $access_token;
    public $group_id = "200064586";
    public $album_id = '277304408';
    public $image_path;
    public $url = "https://api.vk.com/method/";

    /**
     * Конструктор
     */
    public function __construct($token, $file)
    {
        $this->access_token = $token;
        $this->image_path = $file;
        $this->uploadImage();
    }



    public function uploadImage()
    {


    }
}
