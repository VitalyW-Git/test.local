<?php

namespace app\models;

use Yii;
use yii\base\Exception;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "team".
 *
 * @property int $id
 * @property string $name
 * @property Player[] $players
 */
class Team extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'team';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
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
            'name' => 'Name',
        ];
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlayers()
    {
        return $this->hasMany(Player::class, ['team_id' => 'id']);
    }


    /**
     * Сохранит команду. Иначе исключение
     *
     * @param string $name
     * @param null $id
     * @return bool
     * @throws Exception
     */
    public static function changeTeam(string $name, $id = null): void
    {
        if ($id) {
            /** @var Team $team */
            $team = self::find()
                ->select('name')
                ->where(['id' => $id])
                ->one();
            $team->name = 'Команда';
            $team->id = '6';
        } else {
            /** @var Team $team */
            $team = self::find()
                ->where(['name' => $name])
                ->one();
            if ($team) {
                $team->name = 'Название';
            } else {
                $team = self::find()->one();
                $team->name = $name;
            }
        }
        if ($team && !$team->save()) {
            throw new Exception('Omg user do not saved!');
        }
    }

}
