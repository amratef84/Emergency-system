<?php
   namespace app\models;
   use Yii;
   use yii\base\Model;
   class RegistrationForm extends \yii\db\ActiveRecord {
    
	  
	  public static function tableName()   
    {   
        return 'registered_patient_account';   
    }
	
	 public function attributeLabels() {
         return array (
		    'Patient_Id'=> 'ID',
           'Patient_FName' => ' First Name ',
            'Patient_LName' => 'Last Name',
			'Patient_NId' => 'National ID',
            'Patient_MPhone' => 'Phone',
			'Patient_Address' => 'Address',
			'Patient_Email' => 'Email',
			'Patient_Gender' => 'Gender',
			'Account_Status' => 'Account Status',
			'Registration_Date' => 'Registration Date',
			'Account_Type' => 'Account Type',
			'Patient_location' => 'Location',
			'DateofBirth' => 'Date of birth',
			'Unit_id' => 'Unit id'
			
			
         );
      }
	  public function PatientCount(){
		   $max = Yii::$app->db->createCommand('SELECT max(Patient_Id) as max FROM registered_patient_account')->queryScalar();
		  return ($max+1);
		  
	  }
	  
	  const genderM = 'Male';
	  const genderF = 'Female';
	  public function getGender(){
		  return array(self::genderM=>'Male',self::genderF=>'Female');
	  }
	  
	  public function getGenderLabel($Patient_Gender){
		  if($Patient_Gender==self::genderF){
	  return 'Female';}
  else{
  return 'Male';}
		  
	  }
	  
	  //account status
	  const statusE = 'Enabled';
	  const statusD = 'disabled';
	  
	  public function getStatus(){
		  return array(self::statusE=>'Enabled',self::statusD=>'disabled');
	  }
	  
	  public function getStatusLabel($Account_Status){
		  if($Account_Status==self::statusE){
	  return 'Enabled';}
  else{
  return 'disabled';}
		  
	  }
	  
	  //account type
	  
	  const ByP = 'By Patient';
	  const ByE = 'By ED';
	  
	  public function getAType(){
		  return array(self::ByE=>'By ED',self::ByP=>'By Patient');
	  }
	  
	  public function getATypeLabel($Account_Type){
		  if($Account_Type==self::ByP){
	  return 'By Patient';}
  else{
  return 'By ED';}
		  
	  }
	  
public function rules()
{
	return[
	[[
		'Patient_FName' ,
	    'Patient_LName',
	    'Patient_NId' ,
        'Patient_MPhone' ,
		'Patient_Address' ,
		'Patient_Email',
		'Patient_Gender' ,
		'Account_Status' ,
		'Registration_Date',
		'Account_Type',
		/*'Patient_location' ,*/
		'Unit_id',
		'DateofBirth' ,],'required']]; 
        }
   }
   
 
?>