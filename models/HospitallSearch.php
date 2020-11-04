<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Hospital;

/**
 * HospitallSearch represents the model behind the search form of `app\models\Hospital`.
 */
class HospitallSearch extends Hospital
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Hosp_id'], 'integer'],
            [['Hosp_name', 'Hosp_desc', 'Hosp_location', 'Status'], 'safe'],
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
        $query = Hospital::find();

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
            'Hosp_id' => $this->Hosp_id,
        ]);

        $query->andFilterWhere(['like', 'Hosp_name', $this->Hosp_name])
            ->andFilterWhere(['like', 'Hosp_desc', $this->Hosp_desc])
            ->andFilterWhere(['like', 'Hosp_location', $this->Hosp_location])
            ->andFilterWhere(['like', 'Status', $this->Status]);

        return $dataProvider;
    }
}
