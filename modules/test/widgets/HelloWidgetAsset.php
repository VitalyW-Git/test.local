<?php

namespace app\modules\test\widgets;

use yii\web\AssetBundle;

class HelloWidgetAsset extends AssetBundle
{
    /** @inheritdoc */
    public $sourcePath = '@app/modules/test/widgets/assets';

//    public $basePath = '@webroot';
//    public $baseUrl = '@web';

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
    ];
}
