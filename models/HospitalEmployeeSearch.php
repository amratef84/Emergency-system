<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\HospitalEmployee;

/**
 * HospitalEmployeeSearch represents the model behind the search form of `app\models\HospitalEmployee`.
 */
class HospitalEmployeeSearch extends HospitalEmployee
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['employee_ID', 'Hosp_id'], 'integer'],
            [['employee_Type', 'employee_name','JopTitle', 'Status'], 'safe'],
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
        $query = HospitalEmployee::find();

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
            'employee_ID' => $this->employee_ID,
            //'Hosp_id' => $this->Hosp_id,
        ]);

        $query->andFilterWhere(['like', 'employee_Type', $this->employee_Type])
          ->andFilterWhere(['like', 'employee_name', $this->employee_name])
            ->andFilterWhere(['like', 'JopTitle', $this->JopTitle])
            ->andFilterWhere(['like', 'Status', $this->Status])
        ->andFilterWhere(['like', 'hospital.Hosp_name', $this->Hosp_id]);


        return $dataProvider;
    }
}
