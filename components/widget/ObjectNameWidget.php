<?php


namespace app\components\widget;


use yii\base\Widget;

class ObjectNameWidget extends Widget
{
    /** @var object $object */
    public $object;

    public function run()
    {
        return $this->render('object', ['object' => $this->object]);
    }
}
