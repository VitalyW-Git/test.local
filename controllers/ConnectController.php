<?php

namespace app\controllers;

use Asil\VkMarket\Exception\VkException;
use Asil\VkMarket\Model\Photo;
use Asil\VkMarket\Model\Product;
use Asil\VkMarket\VkConnect;
use Asil\VkMarket\VkServiceDispatcher;
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
}