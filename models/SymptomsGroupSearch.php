<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SymptomsGroup;

/**
 * SymptomsGroupSearch represents the model behind the search form of `app\models\SymptomsGroup`.
 */
class SymptomsGroupSearch extends SymptomsGroup
{
  /**
   * {@inheritdoc}
   */
  public function rules()
  {
    return [
      [['Group_ID'], 'integer'],
      [['GroupName', 'GroupDesc', 'ScoringType', 'Cat_Desc', 'Status'], 'safe'],
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
    $query = SymptomsGroup::find();

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
      'Group_ID' => $this->Group_ID,
    ]);

    $query
      ->andFilterWhere(['like', 'GroupName', $this->GroupName])
      ->andFilterWhere(['like', 'GroupDesc', $this->GroupDesc])
      ->andFilterWhere(['like', 'ScoringType', $this->ScoringType])
      ->andFilterWhere(['like', 'Status', $this->Status])
      ->andFilterWhere(['like', 'Cat_Desc', $this->Cat_Desc]);

    return $dataProvider;
  }
}
