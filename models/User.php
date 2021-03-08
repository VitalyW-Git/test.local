<?php

namespace app\models;

use app\models\interfaces\IHaveName;
use app\models\validators\PhoneValidator;
use app\models\query\UserQuery;
use yii\db\ActiveQuery;
use \yii\db\ActiveRecord;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property int|null $age
 * @property string|null $name
 * @property string|null $last_name
 * @property string $email
 * @property string|null $image
 * @property string|null $password
 * @property int|null $salary
 * @property string $created_at
 * @property string|null $updated_at
 * @property string $phone
 *
 * @property Passport[] $passport
 */
class User extends ActiveRecord implements IHaveName
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }
//    public function attributeLabels() {
//        return [
//            'age' => 'Ваше имя',
//            'email' => 'Ваш email',
//            'password' => 'Сообщение',
//        ];
//    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['age', 'salary'], 'integer'],
            ['email', 'required', 'message' => 'Поле «Email» обязательно для заполнения'],
            ['password', 'required', 'message' => 'Поле «Password» обязательно для заполнения'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'last_name', 'email'], 'string', 'max' => 255],
            [['email'], 'unique'],
            [['phone'], PhoneValidator::class ],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'age' => 'Age',
            'name' => 'Name',
            'last_name' => 'Last Name',
            'email' => 'Email',
            'password' => 'Password',
            'salary' => 'Salary',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    /**
     * Gets query for [[Passwords]].
     *
     * @return ActiveQuery
     */
    public function getPassport()
    {
        return $this->hasOne(Passport::class, ['user_id' => 'id']);
    }
    public static function find()
    {
        return new UserQuery(get_called_class());
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}
