<?php

namespace app\components\widget;

use app\models\User;
use yii\base\Widget;

class AgeMenuWidget extends Widget
{
    public function run()
    {
//        $users = User::find()->select(['id', 'age'])->groupBy('age')->orderBy('age desc')->asArray()->all();
        $sql = 'select age, name, id, count(id) as cnt from user group by age limit 7';
        $db = \Yii::$app->db;
        $usersMenu = $db->createCommand($sql)->queryAll();
        return $this->render('age-menu', ['usersMenu'=> $usersMenu]);
//        debug($users_menu);die();
    }
}