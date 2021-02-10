<?php


namespace app\modules\test\widgets;


use yii\web\AssetBundle;

class HelloWidgetAsset extends AssetBundle
{
    /** @inheritdoc */
    public $sourcePath = '@app/modules/test/widgets/assets';

    /** @inheritdoc */
    public $css = [
        'js/script.js',
    ];

    /** @inheritdoc */
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
