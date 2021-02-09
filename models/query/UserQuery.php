<?php


namespace app\models\query;


use yii\db\ActiveQuery;

class UserQuery extends ActiveQuery
{
    public function successful()
    {
        return $this->andWhere(['>','salary', 50000]);
    }
    public function allder()
    {
        return $this->andWhere(['>','age', 35]);
    }
}