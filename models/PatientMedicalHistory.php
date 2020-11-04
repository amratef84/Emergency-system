<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "patient_medical_history".
 *
 * @property int $Patient_Id
 * @property string $Date_Time
 * @property int $Disease_Id
 * @property string $Disease_Status
 * @property string $Disease_Since
 * @property int $Hosp_id
 *
 * @property RegisteredPatientAccount $patient
 * @property DiseaseDictionary $disease
 * @property Hospital $hosp
 */
class PatientMedicalHistory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'patient_medical_history';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Date_Time', 'Disease_Id', 'Disease_Status', 'Disease_Since', 'Hosp_id'], 'required'],
            [['Date_Time', 'Disease_Since'], 'safe'],
            [['Disease_Id', 'Hosp_id'], 'integer'],
            [['Disease_Status'], 'string'],
            [['Patient_Id'], 'exist', 'skipOnError' => true, 'targetClass' => RegisteredPatientAccount::className(), 'targetAttribute' => ['Patient_Id' => 'Patient_Id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Patient_Id' => 'Patient ID',
            'Date_Time' => 'Date Time',
            'Disease_Id' => 'Disease ID',
            'Disease_Status' => 'Disease Status',
            'Disease_Since' => 'Disease Since',
            'Hosp_id' => 'Hosp ID',
        ];
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
    public function getDisease()
    {
        return $this->hasOne(DiseaseDictionary::className(), ['Disease_Id' => 'Disease_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHosp()
    {
        return $this->hasOne(Hospital::className(), ['Hosp_id' => 'Hosp_id']);
    }
}
