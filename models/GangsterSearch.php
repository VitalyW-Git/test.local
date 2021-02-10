<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Gangster;

/**
 * UserSearch represents the model behind the search form of `app\models\User`.
 */
class GangsterSearch extends Gangster
{
    public $gun;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'age', 'name', 'gun', 'status', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        return Model::scenarios();
    }

    /**
     * @param array $params
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Gangster::find()->joinWith('gun');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 2
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'age' => $this->age,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        $query->andFilterWhere(['like', 'gun.gun', $this->gun]);

        return $dataProvider;
    }

    public function fet($params)
    {

    }
}
