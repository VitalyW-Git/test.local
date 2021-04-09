<?php

namespace app\components\widget\vue;

use yii\base\Widget;
use yii\helpers\Html;

class VueWidget extends Widget
{
    /** @var string $component */
    public $component;
    /** @var array $props */
    public $props = [];

    public function init()
    {
        parent::init();
        VueAssets::register($this->view);
    }

    public function run()
    {
        parent::run();
        echo Html::tag('div', Html::tag($this->component, '', $this->props), ['id' => $this->getVueId()]);
        $this->view->registerJs(
            "
            new window.Vue({
                    el: '#" . $this->getVueId() . "'
                })
            "
        );
    }

    public function getVueId()
    {
        return 'vue' . $this->getId();
    }
}