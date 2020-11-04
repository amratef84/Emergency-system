<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PatientRequest;

/**
 * PatientRequestSearch represents the model behind the search form of `app\models\PatientRequest`.
 */
class PatientRequestSearch extends PatientRequest
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Request_Id', 'Request_Status', 'Estimated_Level'], 'integer'],
            [['RequestTime','Patient_Id', 'Request_Type',], 'safe'],
            [['Estimated_score'], 'number'],
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
    public function search($query,$params)
    {
        //$query = PatientRequest::find();
        $query->joinwith(['names']);
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
            'Request_Id' => $this->Request_Id,
            'RequestTime' => $this->RequestTime,
            'Request_Status' => $this->Request_Status,
            'Estimated_score' => $this->Estimated_score,
            'Estimated_Level' => $this->Estimated_Level,
        ]);

        $query->andFilterWhere(['like', 'Request_Type', $this->Request_Type])
            ->andFilterWhere(['like', 'registered_patient_account.Patient_FName', $this->Patient_Id]);
        return $dataProvider;
    }
}
