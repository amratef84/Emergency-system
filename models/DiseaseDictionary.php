<?php
   namespace app\models;
   use Yii;
  use yii\helpers\ArrayHelper;
   use yii\base\Model;
   class DiseaseDictionary extends \yii\db\ActiveRecord {
	   
	    public static function tableName()   
    {   
        return 'disease_dictionary';   
    }
	
    



	 
	   public function attributeLabels()
    {
        return [
            'Disease_Id' => 'Disease ID',
            'Disease_Name' => 'Disease Name',
            'Disease_Code' => 'Disease Code',
            'Disease_Desc' => 'Disease Desc',
            'Status' => 'Status',
        ];
    }
	  
	  public function rules()
    {
        return [
            [['Disease_Id','Disease_Name', 'Disease_Code', 'Disease_Desc', 'Status'], 'safe'],
            [['Status'], 'string'],
            [['Disease_Name', 'Disease_Code'], 'string', 'max' => 30],
            [['Disease_Desc'], 'string', 'max' => 200],
			[[ 
	        [ 'Disease_Name'] ,'string'],['Disease_Id', 'each', 'rule' => [
            'exist', 'tagetClass' => DiseaseDictionary::className(),  'targetAttribute' => 'Disease_Id']
        ]]  
           
        ];
    }
	  
	   public static function getDiseaseList()
    {
        $data =  static::find()
            ->select(['Disease_Id', 'Disease_Name'])
            ->orderBy('Disease_Name')->asArray()->all();
        return ArrayHelper::map($data, 'Disease_Id', 'Disease_Name');
    }
	 
	   
	 public function getPatientMedicalHistories()
    {
        return $this->hasMany(PatientMedicalHistory::className(), ['Disease_Id' => 'Disease_Id']);
    }
	   
	   
   }
   ?>