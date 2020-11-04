<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\HospitalSession;

/**
 * HospitalSessionSearch represents the model behind the search form of `app\models\HospitalSession`.
 */
class HospitalSessionSearch extends HospitalSession
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Session_ID', 'Request_Id', 'Ticket_ID', 'Cat_ID', 'Hosp_decision', 'Unit_id', 'Covid_status', 'employee_ID'], 'integer'],
            [['patient_status', 'advices', 'Session_status', 'Date'], 'safe'],
            [['calculated_Score'], 'number'],
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
        $query = HospitalSession::find();

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
            'Session_ID' => $this->Session_ID,
            'Request_Id' => $this->Request_Id,
            'Ticket_ID' => $this->Ticket_ID,
            'Cat_ID' => $this->Cat_ID,
            'Hosp_decision' => $this->Hosp_decision,
            'Unit_id' => $this->Unit_id,
            'Covid_status' => $this->Covid_status,
            'employee_ID' => $this->employee_ID,
            'calculated_Score' => $this->calculated_Score,
            'Date' => $this->Date,
        ]);

        $query->andFilterWhere(['like', 'patient_status', $this->patient_status])
            ->andFilterWhere(['like', 'advices', $this->advices])
            ->andFilterWhere(['like', 'Session_status', $this->Session_status]);

        return $dataProvider;
    }
}
