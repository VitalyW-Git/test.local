<?php


namespace app\assets;

use yii\web\AssetBundle;

class SiteIndexAssets extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site-style.css',
    ];
    public $js = [
        'js/site-script.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}