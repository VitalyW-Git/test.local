<?php

namespace app\models\common;

class User extends \app\models\User
{
    public function fields()
    {
        return [
            'id',
            'name',
            'email',
            'change',
            'birthday' => function( $model ) {
                return $model->id == 50 ? 'December' : 'November';
            }
        ];
    }

// для связанных данных test.local/user?expand=passport
    public function extraFields()
    {
        return [
            'passport'
        ];
    }

//    для вывода данных link /test.local/user?fields=id,change
    public function getChange()
    {
        return $this->id . ' string';
    }
}