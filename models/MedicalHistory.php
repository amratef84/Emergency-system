<?php
   namespace app\models;
   use Yii;
   use yii\base\Model;
   class MedicalHistory extends \yii\db\ActiveRecord {
	   
	    public static function tableName()   
    {   
        return 'patient_medical_history';   
    }
	
	
	 public function attributeLabels() {
         return array (
		 
		 'Disease_Id' =>'Disease',
		 'Disease_Since'=>' Disease Since ( Optional )'
		 
          
            
         );
      }
	 
	
	 
	 public function rules()   
    {   
        return [   [['Patient_Id','Disease_Id','Hosp_id',
              
        'Disease_Since','Date_Time','Disease_Status'],'safe']];   
      
	}
   
   }
   ?>