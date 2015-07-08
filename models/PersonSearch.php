<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Person;

/**
 * CountrySearch represents the model behind the search form about `app\models\Country`.
 */
class PersonSearch extends Person
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['country_code', 'name', 'sex', 'birthday', 'create_time', 'update_time'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Person::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // 检索条件
        $query->andFilterWhere([
            'id' => $this->id,
        ]);
        
        $query->andFilterWhere(['like', 'name', $this->name])
              ->andFilterWhere(['like', 'sex', $this->sex])
              ->andFilterWhere(['like', 'birthday', $this->birthday])
              ->andFilterWhere(['like', 'country_code', $this->country_code]);

        return $dataProvider;
    }
}
