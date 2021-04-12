<?php

namespace app\components\widget\vue;

use yii\web\AssetBundle;

class VueAssets extends AssetBundle
{
    public $sourcePath  = '@app/components/widget/vue/assets';


    public $js = [
        'js/app.js',
    ];

//    public $depends = [
//        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
//    ];
}