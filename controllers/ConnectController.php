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
    /**
     * @throws VkException
     */
    public function actionData()
    {
        $token = 'b842cc1786c634e1da39bb2f7b72ed213c0e288841b6f506d72df16b09ad10f84462dbd1a102113e47c21';
        $photo = '[{\"markers_restarted\":true,\"photo\":\"bf6b238ee2:x\",\"sizes\":[],\"latitude\":0,\"longitude\":0,\"kid\":\"8da9733487038987e371b73b9bb1f8e0\",\"sizes2\":[[\"s\",\"ba320d70d2b77d831e24c8af066dfc835540c2c12c23e7af906b2ba1\",\"426591580646040240\",75,75],[\"m\",\"28af227bededf52cca07f008211cf4cc05159d0268fb96774e5ebe64\",\"9018979779236483158\",130,130],[\"x\",\"11b27de413901327e6f45b013c4627c7bb5b3a2039a5d3752f2a437d\",\"3591792707075910925\",520,520],[\"o\",\"28af227bededf52cca07f008211cf4cc05159d0268fb96774e5ebe64\",\"9018979779236483158\",130,130],[\"p\",\"93fceb1ab23af3c615ff1ae88f86d68e1eedd9d4e691757c6c7c340e\",\"4954993403952573361\",200,200],[\"q\",\"1589cd0268c257f26d94f6a3ff9557b566e6bd8dcc2a5d768c1b27da\",\"-8845168586407118357\",320,320],[\"r\",\"44cc4dd93e48812c369ee20bdf11ee56c964e130d3b9c667dc4ac503\",\"8146435985550694322\",510,510]],\"urls\":[],\"urls2\":[\"ujINcNK3fYMeJMivBm38g1VAwsEsI-evkGsroQ/sGKUTMiO6wU.jpg\",\"KK8ie-3t9SzKB_AIIRz0zAUVnQJo-5Z3Tl6-ZA/VlDSGVPaKX0.jpg\",\"EbJ95BOQEyfm9FsBPEYnx7tbOiA5pdN1LypDfQ/DS0Z3G-c2DE.jpg\",\"KK8ie-3t9SzKB_AIIRz0zAUVnQJo-5Z3Tl6-ZA/VlDSGVPaKX0.jpg\",\"k_zrGrI688YV_xroj4bWjh7t2dTmkXV8bHw0Dg/sSv_ij-sw0Q.jpg\",\"FYnNAmjCV_JtlPaj_5VXtWbmvY3MKl12jBsn2g/63nCzAimP4U.jpg\",\"RMxN2T5IgSw2nuIL3xHuVslk4TDTucZn3ErFAw/slc1AF70DXE.jpg\"]}]';
        $hash = 'f44fb936a35389186d778861e57600ea';
        $idApp = '20618894';
        $idCategory = '200064586';
//        $queryProduct = 'https://api.vk.com/method/market.get?owner_id=-'.$idApp.'&album_id=20&count=2&access_token='.$token.'&v=5.125';
//        $getProduct = 'https://api.vk.com/method/market.get?owner_id=-'.$idApp.'&album_id=20&count=2&access_token='.$token.'&v=5.125';
        $imgProduct = 'https://api.vk.com/method/photos.getMarketUploadServer?group_id=200064586&access_token='.$token.'&v=5.125';
        $saveProduct = 'https://api.vk.com/method/photos.saveMarketPhoto?group_id=200064586&photo='.$photo.'&server=844129&hash='.$hash.'&access_token='.$token.'&v=5.131';
//        $addProduct = 'https://api.vk.com/method/market.add?owner_id=-'.$idCategory.'&main_photo_id=457239461&name=testing&description=testTestTestTestTest&category_id=901&access_token='.$token.'&v=5.152';
        $getData = file_get_contents($saveProduct);
//        $c = json_decode($getData);
//        $g = $c->response->upload_url;
//        $a = "<form action='$g' enctype='multipart/form-data' method='post'>
//            <input type='file' name='file'>
//            <Button type='submit'>Button</Button>
//        </form>";
        VarDumper::dump(json_decode($getData),11,true);
//        echo $a;
    }

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
// добавляем товар
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


    public function actionModel()
    {
        $group_id = "200064586";
        $album_id = '277304408';
        $v = 5.131;
        $file = '@'.$_SERVER['DOCUMENT_ROOT'] . '/uploads/gm.jpg';
        var_dump($file);die();
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


//        $postparam = ["file1" => $file];
        //Отправляем файл на сервер
        $ch = curl_init($server);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $file);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: multipart/form-data; charset=UTF-8'));
        $json = json_decode(curl_exec($ch));
        curl_close($ch);

        //Сохраняем файл в альбом
        $photo = $this->method("photos.saveMarketPhoto", [
                "group_id" => $group_id,
                "photo" => $json->photo,
                "server" => $json->server,
                "hash" => $json->hash,
                "v" => $v,
            ]
        );
        VarDumper::dump($photo,11,true);
//        VarDumper::dump($photo,11,true);
        if (isset($photo->response[0]->id)) {
            return $photo->response[0]->id;
        } else {
            return false;
        }
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


    public function actionAlbom()
    {
//      фокусы
        $owner_id = 200064586;
        $album_ids = 279884086;
        $token = 'b842cc1786c634e1da39bb2f7b72ed213c0e288841b6f506d72df16b09ad10f84462dbd1a102113e47c21';
        $saveProduct = 'https://api.vk.com/method/photos.getAlbums?owner_id=-'.$owner_id.'&album_ids='.$album_ids.'&access_token='.$token.'&v=5.131';
        $getData = file_get_contents($saveProduct);
        VarDumper::dump(json_decode($getData),11,true);
    }

}