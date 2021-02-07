<?php

namespace app\models;

use Yii;
use yii\base\Model;

class UserForm extends Model
{
    public $age;
    public $name;
    public $last_name;
    public $email;
    public $password;
    public $salary;
    public $created_at;
    public $updated_at;

    public function rules()
    {
        return [

            [['name', 'last_name', 'email', 'password', 'salary', 'created_at', 'updated_at', ], 'trim'],
//            [['name', 'email', 'password'], 'string', 'max' => 30],
//            [['last_name', 'salary', 'created_at', 'updated_at'], 'trim'],
//            ['email', 'email'],
        ];
    }
}