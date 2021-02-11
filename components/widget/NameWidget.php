<?php


namespace app\components\widget;

use app\models\interfaces\IHaveName;
use yii\base\Widget;

class NameWidget extends Widget
{
    /** @var IHaveName[] */
    public $objectsName = [];

    public function run()
    {
        return $this->render('name', ['objectsName' => $this->objectsName]);
    }
}