<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_order".
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $gangster_id
 * @property int|null $price
 * @property string $created_at
 * @property string|null $updated_at
 *
 * @property Gangster $gangster
 * @property User $user
 */
class UserOrder extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'gangster_id', 'price'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['gangster_id'], 'exist', 'skipOnError' => true, 'targetClass' => Gangster::class, 'targetAttribute' => ['gangster_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'gangster_id' => 'Gangster ID',
            'price' => 'Price',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Gangster]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGangster()
    {
        return $this->hasOne(Gangster::class, ['id' => 'gangster_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
