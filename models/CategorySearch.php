<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Category;

/**
 * CategorySearch represents the model behind the search form of `app\models\Category`.
 */
class CategorySearch extends Category
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Cat_ID'], 'integer'],
            [['Cat_code', 'Cat_name', 'Cat_color', 'Cat_desc' , 'Status'], 'safe'],
            [[ 'Thresh_min', 'Thresh_max'], 'number'],
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
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Category::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'Cat_ID' => $this->Cat_ID,
            'Thresh_min' => $this->Thresh_min,
            'Thresh_max' => $this->Thresh_max,
        ]);

        $query->andFilterWhere(['like', 'Cat_code', $this->Cat_code])
            ->andFilterWhere(['like', 'Cat_name', $this->Cat_name])
            ->andFilterWhere(['like', 'Cat_color', $this->Cat_color])
            ->andFilterWhere(['like', 'Cat_desc', $this->Cat_desc])
            ->andFilterWhere(['like', 'Status', $this->Status]);

        return $dataProvider;
    }
}
