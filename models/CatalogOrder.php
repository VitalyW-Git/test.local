<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "catalog_order".
 *
 * @property int $id
 * @property int|null $total_price
 * @property int|null $user_id
 * @property int|null $total_count
 * @property int|null $total_items_price
 * @property string|null $user_name
 * @property string|null $user_surname
 * @property string|null $user_patronymic
 * @property string|null $user_email
 * @property int|null $user_phone
 * @property string|null $user_city
 * @property string $created_at
 * @property string|null $updated_at
 *
 * @property Users $user
 * @property CatalogOrderItems[] $catalogOrderItems
 */
class CatalogOrder extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'catalog_order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['total_price', 'user_id', 'total_count', 'total_items_price', 'user_phone'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['user_name', 'user_surname', 'user_patronymic', 'user_email', 'user_city'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'total_price' => 'Total Price',
            'user_id' => 'User ID',
            'total_count' => 'Total Count',
            'total_items_price' => 'Total Items Price',
            'user_name' => 'User Name',
            'user_surname' => 'User Surname',
            'user_patronymic' => 'User Patronymic',
            'user_email' => 'User Email',
            'user_phone' => 'User Phone',
            'user_city' => 'User City',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::class, ['id' => 'user_id']);
    }

    /**
     * Gets query for [[CatalogOrderItems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCatalogOrderItems()
    {
        return $this->hasMany(CatalogOrderItems::class, ['catalog_order_id' => 'id']);
    }
}
