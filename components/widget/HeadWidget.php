<?php

namespace app\components\widget;

use app\models\Player;
use yii\base\Widget;
use yii\helpers\Html;

class HeadWidget extends Widget
{
    /** @var $message string */
    public $message;
    /** @var $descr string */
    public $descr = 'text';

//    public function init()
//    {
//        parent::init();
//        if ($this->message === null) {
//            $this->message = 'Hello World';
//        }
//    }

    public function run()
    {
        $players = Player::find()->all();
        if ($this->message === null) {
            $this->message = 'Hello World';
        }
//        return Html::encode($this->message);

        return $this->render('head',[
            'message' => $this->message,
            'descr' => $this->descr,
            'players' => $players,
        ]);
    }
}