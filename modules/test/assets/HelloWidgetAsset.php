<?php

namespace app\modules\test\assets;

use yii\web\AssetBundle;

class HelloWidgetAsset extends AssetBundle
{
    //public $basePath = '@webroot';

    //public $baseUrl = '@web';

    /** @inheritdoc */
    public $sourcePath = '@app/modules/test/assets/sources';

    public $css = [
       'css/style-test-hello.css',
    ];

    /** @inheritdoc */
    public $js = [
       'js/script-test-hello.js',
    ];

    /** @inheritdoc */
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
