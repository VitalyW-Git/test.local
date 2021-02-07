<?php


namespace app\commands;
use app\models\User;
use yii\console\Controller;
use yii\console\ExitCode;

class BatchController extends Controller
{

    public function actionT()
    {
        $db = \Yii::$app->db;

        /* $sql = 'select * from user';
         $records = $db->createCommand($sql)->queryAll();

         $sqlInsert = "INSERT user(name, last_name, email) VALUES ('Galaxy S9', 'Samsung', 'dsdsds56@gf2.ee')";
         $result = $db->createCommand($sqlInsert)->execute();
         */


        $data = [
            ['vasy pukarev', 12, 'vasy@fdgfd.ggf',],
            ['vasy2 pu2karev', 42, 'vasy2@fdgfdgfd.ggfdgf',],
        ];
        $columns = ['name', 'age', 'email'];
        $resultBatchInsert = $db->createCommand()->batchInsert('user', $columns, $data)->execute();
        var_dump($resultBatchInsert);
        die;
    }

    public function actionT2(){
        $db = \Yii::$app->db;

        $data = [];
        /** @var User $users */
        $users = User::find()->limit(10)->orderBy(['id' => SORT_ASC])->select('age')->all();

        $i = 2609;
        /** @var User $user */
        foreach ($users as $user) {
            $oneRow = [$i, $user->age, $user->age, 'какой то аддресс '.$i];
            $data[] = $oneRow;
            $i++;
        }
//        var_dump($data);die;
        $columns = ['user_id', 'number', 'code', 'address'];

        $resultBatchInsert = $db->createCommand()->batchInsert('passport', $columns, $data)->execute();
        var_dump($resultBatchInsert);
    }


}