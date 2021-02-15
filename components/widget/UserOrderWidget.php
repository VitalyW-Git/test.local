<?php


namespace app\components\widget;


use app\models\Gangster;
use app\models\User;
use app\models\UserOrder;
use yii\base\Widget;

class UserOrderWidget extends Widget
{
    /** @var object $object */
    public $object;

    public function run()
    {
        $order = UserOrder::find()->count();
        $user = User::find()->count();
        $gangster = Gangster::find()->count();
        return $this->render('user-order', [
            'order'=> $order,
            'user'=> $user,
            'gangster'=> $gangster,
        ]);
    }
}
