<?php

namespace app\models;
use yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\User;
use app\models\HospitalEmployee;

/**
 * UserSearch represents the model behind the search form of `app\models\Useraccount`.
 */
class UserSearch extends User
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['User_ID', 'Category'], 'integer'],
            [['Username', 'Password', 'Description', 'Status', 'email', 'reset_token','Role_Id'], 'safe'],
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
     
      
      $query = null; 
      if(Yii::$app->user->identity->Role_Id == 1){
       $eh = User::find()->where('Role_Id=2',['2'=>Yii::$app->user->identity->Role_Id])->one();
        $sql = "SELECT * FROM `useraccount` WHERE  Role_Id =2";   
        $query = User::findBySql($sql,['2'=>$eh->Role_Id]);
      }
        
       else if(Yii::$app->user->identity->Role_Id == 2){
        $eh = User::find()->where('Role_Id= 3',[' 3'=>Yii::$app->user->identity->Role_Id])->one();
        $sql = "SELECT * FROM `useraccount` WHERE  Role_Id =3";   
        $query = User::findBySql($sql,['3'=>$eh->Role_Id]);
               
               
       }
      
      

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
            'User_ID' => $this->User_ID,
            'Role_Id' => $this->Role_Id,
            'Category' => $this->Category,
        ]);

        $query->andFilterWhere(['like', 'Username', $this->Username])
            ->andFilterWhere(['like', 'Password', $this->Password])
            ->andFilterWhere(['like', 'Description', $this->Description])
            ->andFilterWhere(['like', 'Status', $this->Status])
            ->andFilterWhere(['like', 'email', $this->email])
           
            ->andFilterWhere(['like', 'reset_token', $this->reset_token]);
     

        return $dataProvider;
    }
}