<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "registered_patient_account".
 *
 * @property int $Patient_Id
 * @property string $Patient_FName

 * @property CovidCases[] $covidCases
 * @property PatientMedicalHistory[] $patientMedicalHistories
 * @property PatientRequest[] $patientRequests
 */
class Patient extends \yii\db\ActiveRecord
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
            [['Patient_FName','Patient_LName', 'Patient_NId', 'Patient_MPhone'], 'required'],
    
            [['Patient_FName'], 'string', 'max' => 50],
            [['Patient_LName', 'Patient_NId', 'Patient_MPhone'], 'string', 'max' => 30],
            
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
   

 

}
