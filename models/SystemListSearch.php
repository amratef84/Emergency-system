<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SystemList;

/**
 * SystemListSearch represents the model behind the search form of `app\models\SystemList`.
 */
class SystemListSearch extends SystemList
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Item_id', 'Group_id'], 'integer'],
            [['Item', 'Group_name'], 'safe'],
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
        $query = SystemList::find();

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
            'Item_id' => $this->Item_id,
            'Group_id' => $this->Group_id,
        ]);

        $query->andFilterWhere(['like', 'Item', $this->Item])
            ->andFilterWhere(['like', 'Group_name', $this->Group_name]);

        return $dataProvider;
    }
}
