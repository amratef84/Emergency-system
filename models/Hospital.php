<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hospital".
 *
 * @property int $Hosp_id
 * @property string $Hosp_name
 * @property string $Hosp_desc
 * @property string $Hosp_location
 * @property string $Status
 *
 * @property HospitalEmployee[] $hospitalEmployees
 * @property PatientMedicalHistory[] $patientMedicalHistories
 * @property Unit[] $units
 */
class Hospital extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hospital';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Hosp_name', 'Hosp_desc', 'Hosp_location', 'Status'], 'required'],
            [['Hosp_id'], 'integer'],
            [['Hosp_desc', 'Status'], 'string'],
            [['Hosp_name', 'Hosp_location'], 'string', 'max' => 30],
            [['Hosp_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Hosp_id' => 'Hosp ID',
            'Hosp_name' => 'Hosp Name',
            'Hosp_desc' => 'Hosp Desc',
            'Hosp_location' => 'Hosp Location',
            'Status' => 'Status',
        ];
    }

    /**
     * Gets query for [[HospitalEmployees]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHospitalEmployees()
    {
        return $this->hasMany(HospitalEmployee::className(), ['Hosp_id' => 'Hosp_id']);
    }

    /**
     * Gets query for [[PatientMedicalHistories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPatientMedicalHistories()
    {
        return $this->hasMany(PatientMedicalHistory::className(), ['Hosp_id' => 'Hosp_id']);
    }

    /**
     * Gets query for [[Units]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUnits()
    {
        return $this->hasMany(Unit::className(), ['Hosp_id' => 'Hosp_id']);
    }
    
    
    
    
    
    public static function getHospitalsCount(){
    return count(self::find()->all());
  }

    public function IdCount(){
           $max = Yii::$app->db->createCommand('SELECT max(Hosp_id) as max FROM kacst.hospital')->queryScalar();
          return ($max+1);}
}
