<?php


namespace app\commands;


use yii\console\Controller;
use yii\console\ExitCode;
use \app\models\User;
use \app\models\Passport;

class DataController extends Controller
{
    /**
     * @param array $array
     * @return string
     */
    public function randomVal(array $array): string
    {
        $rand_name = array_rand($array, 1);
        return $array[$rand_name];
    }

    /**
     * @return string
     */
    public function getSymbols(): string
    {
        $alphabet = range('a', 'z');
        $numbers = range(0, 9);
        $total = array_merge($alphabet , $numbers);
        return implode('', $total);
    }

    /**
     * @return int
     */
    public function actionIndex()
    {
        $successUser = 0;
        $name = ['Петя', 'Василий', 'Сергей ', 'Георгий'];
        $last_name = ['Петров', 'Иванов', 'Гришин', 'Сорокин'];
        $city = ['Москва', 'Крым', 'Уфа', 'Кострома'];
        $permitted_email = $this->getSymbols();

        for ($i = 1; $i < 1000; $i++) {
            $ran_text = substr(str_shuffle($permitted_email), 0, 10);

            $user = new User();
            $user->name = $this->randomVal($name);
            $user->salary = mt_rand(50000, 80000);
            $user->password = strval(mt_rand(10000, 100000)) . $ran_text;
            $user->email = $ran_text . mt_rand(10, 30) . '@mail.ru';
            $user->last_name = $this->randomVal($last_name);;
            $user->age = mt_rand(30, 50);
            $resultSave = $user->save();
            if (!$resultSave) {
                print_r($user->errors);
                exit();
            } else {
                $successUser++;
            }

            $password = new Passport();
            $password->user_id = $user->id;
            $password->number = strval(mt_rand(100, 100000));
            $password->code = strval(mt_rand(100, 100000));
            $password->address = 'д.2ул.Ленина';
            $password->city = $this->randomVal($city);
            $resultSave = $password->save();
            if (!$resultSave) {
                print_r($password->errors);
                exit();
            }
//            $user = User::generate();
//            $passport =Passport::generate($user);
        }
        echo "добавлено пользователей " . $successUser . PHP_EOL;
        return ExitCode::OK;
    }

}