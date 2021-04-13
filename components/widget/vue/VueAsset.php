<?php

namespace app\components\widget\vue;

use yii\web\AssetBundle;

class VueAsset extends AssetBundle
{
    public $sourcePath  = '@app/components/widget/vue/';

    public $js = [
        'assets/app.js',
        'assets/lorem.app.js',
    ];

//    public $depends = [
//        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
//    ];
}