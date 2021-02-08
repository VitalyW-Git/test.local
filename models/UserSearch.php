<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\User;

/**
 * UserSearch represents the model behind the search form of `app\models\User`.
 */
class UserSearch extends User
{
    public $code;
    public $number;
    public $abc;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
//            [['id', 'age', 'salary'], 'integer'],
            [['id', 'age', 'salary', 'name', 'last_name', 'email', 'password', 'created_at', 'updated_at'], 'safe'],
            [['code', 'number', 'abc'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * @param array $params
     * @return ActiveDataProvider
     */
    public function search($params) // параметр запроса, поле поиска
    {
        $query = User::find()->joinWith('passport'); //вернёт объкт sql запроса, жадная загрузка

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10 // пагинация
            ],
        ]);
//        $posts = $dataProvider->getModels();
//        debug($posts);die();

        $this->load($params); // в модель User загрузить полученые параметр $params

        if (!$this->validate()) {
            return $dataProvider;
        }

        // grid filtering conditions andFilterWhere пропускает пустые значения
        $query->andFilterWhere([
            'id' => $this->id,
            'age' => $this->age,
            'salary' => $this->salary,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);
        // andFilterWhere пропускает пустые значения
        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'password', $this->password]);

        // поиск по паспортам
        $query->andFilterWhere(['like', 'passport.code', $this->code])
            ->andFilterWhere(['like', 'passport.number', $this->number])
            ->andFilterWhere(['like', 'passport.address', $this->abc]);

        return $dataProvider;
    }
}
