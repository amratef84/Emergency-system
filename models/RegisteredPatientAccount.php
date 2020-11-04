<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "registered_patient_account".
 *
 * @property int $Patient_Id
 * @property string $Patient_FName
 * @property string $Patient_LName
 * @property string $Patient_NId
 * @property string $Patient_MPhone
 * @property string $Patient_Address
 * @property string $Patient_Email
 * @property string $Patient_Gender
 * @property string $Account_Status
 * @property string $Registration_Date
 * @property string $Account_Type
 * @property string $Patient_location
 * @property string $DateofBirth
 *
 * @property CovidCases[] $covidCases
 * @property PatientMedicalHistory[] $patientMedicalHistories
 * @property PatientRequest[] $patientRequests
 */
class RegisteredPatientAccount extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'registered_patient_account';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Patient_FName', 'Patient_LName', 'Patient_NId', 'Patient_MPhone','Unit_id', 'Patient_Address', 'Patient_Email', 'Patient_Gender', 'Account_Status', 'Registration_Date', 'Account_Type', 'Patient_location', 'DateofBirth'], 'required'],
			[['Patient_NId','Unit_id',],'integer'],
            [['Patient_Gender', 'Account_Status', 'Account_Type', 'Patient_location'], 'string'],
            [['Registration_Date', 'DateofBirth'], 'safe'],
            [['Patient_FName', 'Patient_Address'], 'string', 'max' => 50],
            [['Patient_LName', 'Patient_MPhone'], 'string', 'max' => 30],
            [['Patient_Email'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Patient_Id' => 'Patient ID',
            'Patient_FName' => 'Patient First Name',
            'Patient_LName' => 'Patient Last Name',
            'Patient_NId' => 'Patient National ID',
            'Patient_MPhone' => 'Patient M Phone',
            'Patient_Address' => 'Patient Address',
            'Patient_Email' => 'Patient Email',
            'Patient_Gender' => 'Patient Gender',
			'Unit_id'=>'Unit',
	
            'Account_Status' => 'Account Status',
            'Registration_Date' => 'Registration Date',
            'Account_Type' => 'Account Type',
            'Patient_location' => 'Patient Location',
            'DateofBirth' => 'Dateof Birth',
			'Unit_id'=>'Unit id',
        ];
    }

    /**
     * Gets query for [[CovidCases]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCovidCases()
    {
        return $this->hasMany(CovidCases::className(), ['Patient_Id' => 'Patient_Id']);
    }

    /**
     * Gets query for [[PatientMedicalHistories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPatientMedicalHistories()
    {
        return $this->hasMany(PatientMedicalHistory::className(), ['Patient_Id' => 'Patient_Id']);
    }

    /**
     * Gets query for [[PatientRequests]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPatientRequests()
    {
        return $this->hasMany(PatientRequest::className(), ['Patient_Id' => 'Patient_Id']);
    }
    
    
    public static function getPatientsCount(){
    return count(self::find()->all());
  }
}
