<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Systemparameters;

/**
 * SystemparametersSearch represents the model behind the search form of `app\models\Systemparameters`.
 */
class SystemparametersSearch extends Systemparameters
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['SP_id', 'SP_value'], 'integer'],
            [['SP_item', 'description'], 'safe'],
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
        $query = Systemparameters::find();

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
            'SP_id' => $this->SP_id,
            'SP_value' => $this->SP_value,
        ]);

        $query->andFilterWhere(['like', 'SP_item', $this->SP_item])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
