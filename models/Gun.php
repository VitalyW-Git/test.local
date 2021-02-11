<?php

namespace app\models;

use app\models\interfaces\IHaveName;
use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "gun".
 *
 * @property int $id
 * @property int|null $gangster_id
 * @property string|null $gun
 * @property string $created_at
 * @property string|null $updated_at
 *
 * @property Gangster $gangster
 */
class Gun extends ActiveRecord implements IHaveName
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gun';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['gangster_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['gun'], 'string', 'max' => 255],
            [['gangster_id'], 'unique'],
            [['gangster_id'], 'exist', 'skipOnError' => true, 'targetClass' => Gangster::class, 'targetAttribute' => ['gangster_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'gangster_id' => 'Gangster ID',
            'gun' => 'Gun',
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
     * @return string
     */
    public function getName()
    {
        return $this->gun;
    }
}
