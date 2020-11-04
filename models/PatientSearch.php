<?php

namespace app\models;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Patient;
use app\models\HospitalEmployee;

/**
 * PatientSearch represents the model behind the search form of `app\models\Patient`.
 */
class PatientSearch extends Patient
{
    /**
     * {@inheritdoc}
     */
   // public $fullName;
   public function rules()
    {
        return [
            [['Patient_Id','Patient_NId'], 'integer'],
            [['Patient_FName',
            'Patient_LName',
            'Patient_MPhone',    
            'Patient_Gender',
            'Account_Status',
            'Registration_Date',
            'Account_Type',
            'Patient_location',], 'safe'],
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
    
         $query = Patient::find();  
         
       //$query = null; 
         
         /*
   
        $eh = HospitalEmployee::find()->where('User_ID=:ui',[':ui'=>Yii::$app->user->identity->User_ID])->one();
		$un=Unit::find()->where(['Hosp_id'=>$eh->Hosp_id])->one();
        $sql = "SELECT * FROM `registered_patient_account` WHERE  Unit_id = :hi";   
        $query = Patient::findBySql($sql,[':hi'=>$un->Unit_id]);
        
        */

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
            'Patient_Id' => $this->Patient_Id,
            'Patient_NId' => $this->Patient_NId,
            
        ]);
        
     

        $query->andFilterWhere(['like', 'Patient_FName', $this->Patient_FName])
         ->andFilterWhere(['like', 'Patient_LName', $this->Patient_LName])
         ->andFilterWhere(['like', 'Patient_MPhone', $this->Patient_MPhone])
         ->andFilterWhere(['like', 'Patient_Gender', $this->Patient_Gender])
         ->andFilterWhere(['like', 'Account_Status', $this->Account_Status])
         ->andFilterWhere(['like', 'Registration_Date', $this->Registration_Date])
         ->andFilterWhere(['like', 'Account_Type', $this->Account_Type])
         ->andFilterWhere(['like', 'Patient_location', $this->Patient_location]);
            
         
           


        return $dataProvider;
    }
}
