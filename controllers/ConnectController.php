<?php

namespace app\controllers;

use app\components\ConnectVkApi;
use Asil\VkMarket\Exception\VkException;
use Asil\VkMarket\Model\Photo;
use Asil\VkMarket\Model\Product;
use Asil\VkMarket\VkConnect;
use Asil\VkMarket\VkServiceDispatcher;
use CURLFile;
use yii\helpers\VarDumper;
use yii\web\Controller;

class ConnectController extends Controller
{

    public function actionGetCategory()
    {
        $url_vk = 'https://api.vk.com/method/';
        $img = [0 => 'image.jpg'];
        $ownerId = '200064586';
        $token = 'b842cc1786c634e1da39bb2f7b72ed213c0e288841b6f506d72df16b09ad10f84462dbd1a102113e47c21';

// Запрашиваем ссылку для загрузки фотографии
        $url = $url_vk.'photos.getMarketAlbumUploadServer?group_id='.$ownerId.'&access_token='.$token.'&v=5.131';
        echo '<br>'.$url;
        sleep(3);
        $jsonHtmlServe = file_get_contents($url);
        $json = json_decode($jsonHtmlServe, true);
        echo '<pre>';print_r($json);echo'==========================================</pre>';
        $uploadUrl = $json['response']['upload_url'];
// Отправляем фотографию на сервер
        echo '<br>'.$uploadUrl;
        $ch = curl_init($uploadUrl); // создаем подключение
        $postData = '@'.$_SERVER['DOCUMENT_ROOT'].'/uploads/'.$img[0];
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        sleep(3);
        $jsonHtmlConnect = curl_exec($ch);
        curl_close($ch);
        $json = json_decode($jsonHtmlConnect, true);
        echo '<pre>';print_r($json);echo'==========================================</pre>';
        $server = $json['server'];
        $photo = $json['photo'];
        $hash = $json['hash'];
// Сохраняем фотографию
        $url = $url_vk.'photos.saveMarketAlbumPhoto?group_id='.$ownerId.'&photo='.$photo.'&server='.$server.'&hash='.$hash.'&access_token='.$token.'&v=5.131';
        echo '<br>'.$url;
        sleep(3);
        $jsonHtmlSave = file_get_contents($url);
        $json = json_decode($jsonHtmlSave, true);
        echo '<pre>';print_r($json);echo'==========================================</pre>';
//        $buf[] = 'photo_id='.$json['response'][0]['pid'];
    }

    public function actionVk()
    {
            ini_set('max_execution_time', 0);

            $url_vk = 'https://api.vk.com/method/';
            $owner_id = '**********';
            $access_token = '***********************************************************************************************************';

            foreach ($arr as $key => $value)
            {
                if ($arr[$key]['vk_album_id'] == '')
                {
// создание новой подборки
                    $buf = [];
                    $buf[] = 'owner_id=-'.$owner_id;
                    $buf[] = 'title='.urlencode($arr[$key]['name']);
                    $buf[] = 'access_token='.$access_token;
                    if ($arr[$key]['img'] <> '') {
// Запрашиваем ссылку для загрузки фотографии
                        $url = $url_vk.'photos.getMarketAlbumUploadServer?group_id='.$owner_id.'&access_token='.$access_token;
                        echo '<br>'.$url;
                        sleep(3);
                        $json_html = file_get_contents($url);
                        $json = json_decode($json_html, true);
                        echo '<pre>';print_r($json);echo'</pre>';
                        $upload_url = $json['response']['upload_url'];
// отправляем фотографию на сервер
                        echo '<br>'.$upload_url;
                        $ch = curl_init($upload_url); // создаем подключение
                        $postData['file'] = '@'.$_SERVER['DOCUMENT_ROOT'].$arr[$key]['img'];
                        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        sleep(3);
                        $json_html = curl_exec($ch);
                        curl_close($ch);
                        $json = json_decode($json_html, true);
                        echo '<pre>';print_r($json);echo'</pre>';
                        $server = $json['server'];
                        $photo = $json['photo'];
                        $hash = $json['hash'];
// сохраняем фотографию
                        $url = $url_vk.'photos.saveMarketAlbumPhoto?group_id='.$owner_id.'&photo='.$photo.'&server='.$server.'&hash='.$hash.'&access_token='.$access_token;
                        echo '<br>'.$url;
                        sleep(3);
                        $json_html = file_get_contents($url);
                        $json = json_decode($json_html, true);
                        echo '<pre>';print_r($json);echo'</pre>';
                        $buf[] = 'photo_id='.$json['response'][0]['pid'];
                    }
// добавляем подборку
                    $url = $url_vk.'market.addAlbum?'.implode('&', $buf);
                    echo '<br>'.$url;
                    sleep(3);
                    $json_html = file_get_contents($url);
                    $json = json_decode($json_html, true);
                    echo '<pre>';print_r($json);echo'</pre>';
                    $market_album_id = $json['response']['market_album_id'];

                    $arr[$key]['vk_album_id'] = $market_album_id;
                    $sql = 'UPDATE '.$arr[$key]['table'].' SET vk_album_id = "'.$market_album_id.'" WHERE '.$arr[$key]['table_name_col_id'].' = '.$arr[$key]['id'];
                    $query = mysql_query($sql);
                }
                foreach ($arr[$key]['goods'] as $key2 => $value2) {
                    if ($arr[$key]['goods'][$key2]['vk_market_item_id'] == '') {
// запрос на добавление товара
                        $buf = [];
                        $buf[] = 'owner_id=-'.$owner_id;
                        $buf[] = 'name='.urlencode($arr[$key]['goods'][$key2]['name']);
                        $buf[] = 'description='.urlencode($arr[$key]['goods'][$key2]['description']);
                        $buf[] = 'category_id='.$arr[$key]['vk_category_id'];
                        $buf[] = 'price='.$arr[$key]['goods'][$key2]['price'];
                        $buf[] = 'deleted='.$arr[$key]['goods'][$key2]['deleted'];
                        $buf[] = 'access_token='.$access_token;
                        if ($arr[$key]['goods'][$key2]['img'] <> '') {
// Запрашиваем ссылку для загрузки фотографии
                            $url = $url_vk.'photos.getMarketUploadServer?group_id='.$owner_id.'&access_token='.$access_token.'&main_photo=1';
                            echo '<br>'.$url;
                            sleep(3);
                            $json_html = file_get_contents($url);
                            $json = json_decode($json_html, true);
                            echo '<pre>';print_r($json);echo'</pre>';
                            $upload_url = $json['response']['upload_url'];
// отправляем фотографию на сервер
                            echo '<br>'.$upload_url;
                            $ch = curl_init($upload_url); // создаем подключение
                            $postData['file'] = '@'.$_SERVER['DOCUMENT_ROOT'].$arr[$key]['goods'][$key2]['img'];
                            curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                            sleep(3);
                            $json_html = curl_exec($ch);
                            curl_close($ch);
                            $json = json_decode($json_html, true);
                            echo '<pre>';print_r($json);echo'</pre>';
                            $photo = $json['photo'];
                            $server = $json['server'];
                            $hash = $json['hash'];
                            $crop_data = $json['crop_data'];
                            $crop_hash = $json['crop_hash'];
// сохраняем фотографию
                            $url = $url_vk.'photos.saveMarketPhoto?group_id='.$owner_id.'&photo='.$photo.'&server='.$server.'&hash='.$hash.'&crop_data='.$crop_data.'&crop_hash='.$crop_hash.'&access_token='.$access_token;
                            echo '<br>'.$url;
                            sleep(3);
                            $json_html = file_get_contents($url);
                            $json = json_decode($json_html, true);
                            echo '<pre>';print_r($json);echo'</pre>';
                            $buf[] = 'main_photo_id='.$json['response'][0]['pid'];
                        }
// добавляем товар
                        $url = $url_vk.'market.add?'.implode('&', $buf);
                        echo '<br>'.$url;
                        sleep(3);
                        $json_html = file_get_contents($url);
                        $json = json_decode($json_html, true);
                        echo '<pre>';print_r($json);echo'</pre>';
                        $market_item_id = $json['response']['market_item_id'];
//переносим его в подборку
                        $url = $url_vk.'market.addToAlbum?access_token='.$access_token.'&owner_id=-'.$owner_id.'&item_id='.$market_item_id.'&album_ids='.$arr[$key]['vk_album_id'];
                        echo '<br>'.$url;
                        sleep(3);
                        $json_html = file_get_contents($url);
                        echo '<pre>';print_r($json);echo'</pre>';

//обновляем vk ключ у товара
                        $arr[$key]['goods'][$key2]['vk_market_item_id'] = $market_item_id;
                        $sql = 'UPDATE '.$arr[$key]['goods'][$key2]['table'].' SET vk_market_item_id = "'.$market_item_id.'" WHERE '.$arr[$key]['goods'][$key2]['table_name_col_id'].' = '.$arr[$key]['goods'][$key2]['id'];
                        $query = mysql_query($sql);
                    } else {
// изменяем товар
                        $buf[] = 'owner_id=-'.$owner_id;
                        $buf[] = 'name='.urlencode($arr[$key]['goods'][$key2]['name']);
                        $buf[] = 'description='.urlencode($arr[$key]['goods'][$key2]['description']);
                        $buf[] = 'category_id='.$arr[$key]['vk_category_id'];
                        $buf[] = 'price='.$arr[$key]['goods'][$key2]['price'];
                        $buf[] = 'deleted='.$arr[$key]['goods'][$key2]['deleted'];
                        $buf[] = 'access_token='.$access_token;
                        $buf[] = 'item_id='.$arr[$key]['goods'][$key2]['vk_market_item_id'];

                        $url = $url_vk.'market.getById?item_ids=-'.$owner_id.'_'.$arr[$key]['goods'][$key2]['vk_market_item_id'].'&access_token='.$access_token.'&extended=1';
                        echo '<br>'.$url;
                        sleep(3);
                        $json_html = file_get_contents($url);
                        $json = json_decode($json_html, true);
                        echo '<pre>';print_r($json);echo'</pre>';
                        print_r($json);
                        $buf[] = 'main_photo_id='.$json['response'][1]['photos'][0]['pid'];


                        $url = $url_vk.'market.edit?'.implode('&', $buf);
                        echo '<br>'.$url;
                        sleep(3);

                        $json_html = file_get_contents($url);
                        $json = json_decode($json_html, true);
                        echo '<pre>';print_r($json);echo'</pre>';
//удаляем из всех подборок
                        $list = [];
                        foreach ($arr as $key3 => $value3)
                        {
                            if ($arr[$key3]['vk_album_id'] <> $arr[$key]['vk_album_id'])
                            {
                                $list[] = $arr[$key3]['vk_album_id'];
                            }
                        }
                        $url = $url_vk.'market.removeFromAlbum?access_token='.$access_token.'&owner_id=-'.$owner_id.'&item_id='.$arr[$key]['goods'][$key2]['vk_market_item_id'].'&album_ids='.implode(',',$list);
                        echo '<br>'.$url;
                        sleep(3);
                        $json_html = file_get_contents($url);
                        echo '<pre>';print_r($json);echo'</pre>';
//переносим его в подборку
                        $url = $url_vk.'market.addToAlbum?access_token='.$access_token.'&owner_id=-'.$owner_id.'&item_id='.$arr[$key]['goods'][$key2]['vk_market_item_id'].'&album_ids='.$arr[$key]['vk_album_id'];
                        echo '<br>'.$url;
                        sleep(3);
                        $json_html = file_get_contents($url);
                        echo '<pre>';print_r($json);echo'</pre>';

                    }
                }
            }
    }


    public function actionAddProduct()
    {
        $group_id = "20618894"; // owner_id, [market_item_id] => 5400440
        $album_id = '277304408';
        $owner_id = '-20618894';
        $v = 5.131;
        $file = $_SERVER['DOCUMENT_ROOT'] . '/uploads/gm1.jpg';
        $buf = [];

        $params = [];
        if ($group_id) {
            $params['group_id'] = $group_id;
        }
        if ($v) {
            $params['v'] = $v;
        }

        //Получаем сервер для загрузки изображения
        $response = $this->method("photos.getMarketUploadServer", $params);

        if (isset($response) == false) {
            print_r($response);
            exit;
        }
        $server = $response->response->upload_url;

        $json = $this->dispatchImageOnServerVk($file, $server);



        //Сохраняем изображение на сервере
        $photo = $this->method("photos.saveMarketPhoto", [
                "group_id" => $group_id,
                "photo" => $json->photo,
                "server" => $json->server,
                "hash" => $json->hash,
                "v" => $v,
            ]
        );
        VarDumper::dump($photo->response[0]->id,11,true);

        if (isset($photo->response[0]->id)) {
            $buf['main_photo_id'] = $photo->response[0]->id;
        } else {
            return false;
        }

        // Добавляем товара
        $prod = $this->method("market.add", [
                "owner_id" => $owner_id,
                "name" => 'testTest',
                "description" => '\nЗаказать через сайт:https:\n//model-lavka.ru/cat/trains/16790.html?r1=yandext&r2=',
                "category_id" => '902',
                "price" => '555',
                "main_photo_id" => $buf['main_photo_id'],
                "v" => $v,
            ]
        );
        sleep(3);
        VarDumper::dump($photo->response[0]->id,11,true);
        VarDumper::dump($prod,11,true);
    }

    public function actionAddNewAlbum()
    {

    }

    /**
     * Делает запрос к Api VK
     * @param $method
     * @param null $params
     * @return false|mixed
     */
    public function method($method, $params = null)
    {
        $token = 'b842cc1786c634e1da39bb2f7b72ed213c0e288841b6f506d72df16b09ad10f84462dbd1a102113e47c21';
        $url = "https://api.vk.com/method/";
        $p = "";
        if ($params && is_array($params)) {
            foreach ($params as $key => $param) {
                $p .= ($p == "" ? "" : "&") . $key . "=" . urlencode($param);
            }
        }

        $response = file_get_contents($url.$method."?".($p ? $p."&":"")."access_token=".$token);

        if ($response) {
            return json_decode($response);
        }
        return false;
    }

    public function dispatchImageOnServerVk($file, $server)
    {
        //Отправляем изображение на сервер
        $file = curl_file_create($file,'image/jpeg','gm1.jpg');
        $ch = curl_init($server);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, ["file" => $file]);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: multipart/form-data; charset=UTF-8']);
        sleep(3);
        $exec = curl_exec($ch);
        curl_close($ch);
        return json_decode($exec);
    }


}