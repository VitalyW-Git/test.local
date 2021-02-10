<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gangster".
 *
 * @property int $id
 * @property int|null $age
 * @property string|null $name
 * @property int|null $status
 * @property string $created_at
 * @property string|null $updated_at
 *
 * @property Gun $gun
 */
class Gangster extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gangster';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['age', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
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
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Gun]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGun()
    {
        return $this->hasOne(Gun::class, ['gangster_id' => 'id']);
    }


}
