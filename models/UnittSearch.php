<?php

namespace app\models;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Unitt;
use yii\models\EmployeePrivileges;
use app\models\HospitalEmployee;




/**
 * UnitSearch represents the model behind the search form of `app\models\Unit`.
 */
class UnittSearch extends Unitt
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Unit_id', 'Capacity', 'Hosp_id', 'Number_nurses', 'Number_doctors', 'Number_staff', 'CurrentPatients', 'ServedPatient', 'AdmittingPatient', 'admin_id'], 'integer'],
            [['Unit_code', 'Unit_name', 'Unit_desc', 'Type_of_resources', 'Status'], 'safe'],
            [['availability'], 'number'],
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
      $sql = "SELECT * FROM `unit`";   
      $query = Unitt::findBySql($sql);
      }
      else if(Yii::$app->user->identity->Role_Id == 2){
        $eh = HospitalEmployee::find()->where('User_ID=:ui',[':ui'=>Yii::$app->user->identity->User_ID])->one();
        $sql = "SELECT * FROM `unit` WHERE  Hosp_id = :hi";   
        $query = Unitt::findBySql($sql,[':hi'=>$eh->Hosp_id]);
        
      }
      
       else {
        $eh = HospitalEmployee::find()->where('User_ID=:ui',[':ui'=>Yii::$app->user->identity->User_ID])->one();
        $sql = "SELECT * FROM `unit` WHERE Unit_id in (select Unit_id from employee_privileges where User_id = :ui) && Hosp_id = :hi";   
      $query = Unitt::findBySql($sql,[':ui'=>Yii::$app->user->identity->User_ID,':hi'=>$eh->Hosp_id]);
        
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
            'Unit_id' => $this->Unit_id,
            'Capacity' => $this->Capacity,
            'Hosp_id' => $this->Hosp_id,
            'Number_nurses' => $this->Number_nurses,
            'Number_doctors' => $this->Number_doctors,
            'Number_staff' => $this->Number_staff,
            'CurrentPatients' => $this->CurrentPatients,
            'ServedPatient' => $this->ServedPatient,
            'AdmittingPatient' => $this->AdmittingPatient,
            'admin_id' => $this->admin_id,
            'availability' => $this->availability,
        ]);

        $query->andFilterWhere(['like', 'Unit_code', $this->Unit_code])
            ->andFilterWhere(['like', 'Unit_name', $this->Unit_name])
            ->andFilterWhere(['like', 'Unit_desc', $this->Unit_desc])
            ->andFilterWhere(['like', 'Type_of_resources', $this->Type_of_resources])
            ->andFilterWhere(['like', 'Status', $this->Status]);

        return $dataProvider;
    }
}
