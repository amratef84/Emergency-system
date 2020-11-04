<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Symsen;

/**
 * SymsenSearch represents the model behind the search form of `app\models\Symsen`.
 */
class SymsenSearch extends Symsen
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID', 'Sen_ID', 'Rang_Min', 'Rang_Max', 'Sym_ID'], 'integer'],
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
        $query = Symsen::find();

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
            'ID' => $this->ID,
            'Sen_ID' => $this->Sen_ID,
            'Rang_Min' => $this->Rang_Min,
            'Rang_Max' => $this->Rang_Max,
            'Sym_ID' => $this->Sym_ID,
        ]);

        return $dataProvider;
    }
}
