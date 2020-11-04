<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Symptoms;


class SymptomsSearch extends Symptoms
{
    
    public function rules()
    {
        return [
            


            [['Symp_ID','Symp_Group','Score'], 'integer'],
            [['AdultScore','pediatric_score'], 'number'],
            [['Symp_desc', 'Status','Target', 'Type','Symp_name'], 'string'],

        ];
    }

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
        $query = Symptoms::find();

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
            'Symp_ID' => $this->Symp_ID,
            'Symp_Group' => $this->Symp_Group,
        ]);
      

        $query->andFilterWhere(['like', 'Symp_name', $this->Symp_name])
            ->andFilterWhere(['like', 'Symp_desc', $this->Symp_desc])
            ->andFilterWhere(['like', 'Score', $this->Score])
            ->andFilterWhere(['like', 'AdultScore', $this->AdultScore])
            ->andFilterWhere(['like', 'pediatric_score', $this->pediatric_score])
            ->andFilterWhere(['like', 'Type', $this->Type])
            ->andFilterWhere(['like', 'Target', $this->Target])
            ->andFilterWhere(['like', 'Status', $this->Status]);

        return $dataProvider;
    }
}
