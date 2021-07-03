<?php

namespace app\models;

use app\models\User;
use yii\base\BaseObject;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\db\Expression;
use yii\db\Query;

/**
 * UserSearch represents the model behind the search form of `app\models\User`.
 */
class UserSearch extends User
{
    public $issetPassport;

    public $number;
    public $code;

    public $userSearchMin;
    public $userSearchMax;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['issetPassport', 'code', 'number', 'userSearchMin', 'userSearchMax'], 'safe'],
            [['id', 'age', 'salary', 'name', 'last_name', 'email', 'password', 'created_at', 'updated_at'], 'safe'],
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
        $query = User::find(); //вернёт объкт sql запроса

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 5 // пагинация
            ],
        ]);


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

        return $dataProvider;
    }

    /**
     * @param $params
     * @return ActiveDataProvider
     */
    public function searchNew($params): ActiveDataProvider
    {
        /*$this->load($params);
        if ($this->issetPassport) {
            $querys = User::find()
                ->alias('u')
                ->select('*')
                ->innerJoin('passport p', 'u.id = p.user_id');
        } else {
            $querys = User::find();
        }
        $dataProvider = new ActiveDataProvider([
            'query' => $querys,
            'pagination' => [
                'pageSize' => 5 // пагинация
            ],
        ]);
        if (!$this->validate()) {
            return $dataProvider;
        }*/

        $query = User::find()->joinWith('passport');
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 5
            ],
        ]);

        $sort = $dataProvider->sort;
        $sort->attributes['code'] = [
            'asc' => ['passport.code' => SORT_ASC],
            'desc' => ['passport.code' => SORT_DESC],
        ];
        $sort->attributes['number'] = [
            'asc' => ['passport.number' => SORT_ASC],
            'desc' => ['passport.number' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        if ($this->issetPassport) {
            $subQuery = (new Query())
                ->select([new Expression('1')])
                ->from('passport')
                ->where('user.id = passport.user_id');

            $query->andWhere(['exists', $subQuery]);
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'age' => $this->age,
            'salary' => $this->salary,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);
        $query->andFilterWhere([
            'between', 'age',  $this->userSearchMin, $this->userSearchMax
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
              ->andFilterWhere(['like', 'last_name', $this->last_name])
              ->andFilterWhere(['like', 'email', $this->email])
              ->andFilterWhere(['like', 'password', $this->password])
              ->andFilterWhere(['like', 'passport.code', $this->code])
              ->andFilterWhere(['like', 'passport.number', $this->number]);
        return $dataProvider;

    }
}
