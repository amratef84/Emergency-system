<?php
   namespace app\models;
   use Yii;
   use yii\base\Model;
   class PatientRequest extends \yii\db\ActiveRecord {
   
    public static function tableName()   
    {   
        return 'patient_request';   
    }
	
	   public function attributeLabels()
    {
        return [
            'Request_Id' => 'Request ID',
            'Patient_Id' => 'Patient ID',
            'RequestTime' => 'Request Time',
            'Request_Status' => 'Request Status',
            'Request_Type' => 'Request Type',
            'Estimated_score' => 'Estimated Score',
            'Estimated_Level' => 'Estimated Level',
        ];
    }
/**
	  const ByP = 'By Patient';
	  const ByE = 'By ED';
	  
	  public function getRType(){
		  return array(self::ByP=>'By Patient',self::ByE=>'By ED');
	  }
	  
	  public function getRTypeLabel($Request_Type){
		  if($Request_Type==self::ByE){
	  return 'By ED';}
  else{
  return 'By Patient';}  
    
      
	  }
	  */
	  
	  	
    public function rules()
    {
        return [
            [['Patient_Id', 'RequestTime', 'Request_Status', 'Request_Type', 'Estimated_score', 'Estimated_Level'], 'safe'],
            [['Patient_Id', 'Request_Status', 'Estimated_Level'], 'integer'],
            [['RequestTime'], 'safe'],
            [['Request_Type'], 'string'],
            [['Estimated_score'], 'number'],
            [['Patient_Id'], 'exist', 'skipOnError' => true, 'targetClass' => RegisteredPatientAccount::className(), 'targetAttribute' => ['Patient_Id' => 'Patient_Id']],
        ];
    }
	
    public function RequestType(){
	return 'By ED';
	
      }
	  public function IdCount(){
		   $max = Yii::$app->db->createCommand('SELECT max(Request_Id) as max FROM patient_request')->queryScalar();
		  return ($max+1);
		  
	  }
	  
	   /**
     * @return \yii\db\ActiveQuery
     */
    public function getHospitalSessions()
    {
        return $this->hasMany(HospitalSession::className(), ['Request_Id' => 'Request_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatient()
    {
        return $this->hasOne(RegisteredPatientAccount::className(), ['Patient_Id' => 'Patient_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatientScreenings()
    {
        return $this->hasMany(PatientScreening::className(), ['Request_Id' => 'Request_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatientSensorsDatas()
    {
        return $this->hasMany(PatientSensorsData::className(), ['Request_Id' => 'Request_Id']);
    }
	  
	  
	   public function getNames(){
      return $this->hasOne(RegisteredPatientAccount::className(),['Patient_Id'=>'Patient_Id']);
    }
	
   }
	  
	  
	  