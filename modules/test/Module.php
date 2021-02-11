<?php

namespace app\modules\test;

use yii\web\AssetManager;

/**
 * test module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\test\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
    }
}
