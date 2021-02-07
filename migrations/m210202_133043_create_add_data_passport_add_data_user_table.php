<?php

use yii\db\Migration;
use \app\models\User;

/**
 * Handles the creation of table `{{%add_data_passport_add_data_user}}`.
 */
class m210202_133043_create_add_data_passport_add_data_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $user = new User();
        $user->name = 'Петя';
        $user->salary = 20555;
        $user->password = '12345vvv';
        $user->email = 'test1@mail.ru';
        $user->last_name = 'Петров';
        $user->age = 20;
        $user->save();

        $user2 = new User();
        $user2->name = 'Иван';
        $user2->salary = 30666;
        $user2->password = '54321vvv';
        $user2->email = 'test2@mail.ru';
        $user2->last_name = 'Иванов';
        $user2->age = 21;
        $user2->save();

        $password = new \app\models\Passport();
        $password->user_id = $user->id;
        $password->number = '555';
        $password->code = '555000';
        $password->address = 'д.2ул.Ленина';
        $password->city = 'Москва';
        $password->save();

        $password = new \app\models\Passport();
        $password->user_id = $user2->id;;
        $password->number = '666';
        $password->code = '666111';
        $password->address = 'д.10ул.Свободы';
        $password->city = 'Москва';
        $password->save();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
                /** @var \app\models\User $users */

        $users = \app\models\User::find()->all();
        foreach ($users as $user) {
            $user->delete();
        }
    }

    /**
    * @param User $user
    */
    public function mySave(User $user)
    {
        if (!$user->save()) {
            $err = $user->errors;
            echo "U have error on user where user name =" . $user->name . PHP_EOL;
            print_r($err);
            die;
        }
    }
}
