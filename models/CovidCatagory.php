<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "covidcatagory".
 *
 * @property int $Case_ID
 * @property string $Case_Name
 * @property string $Case_Desc
 * @property string $Status
 * @property float $Thresh_min
 * @property float $Thresh_max
 *
 * @property PatientRequest[] $patientRequests
 */
class CovidCatagory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'covidcatagory';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Case_ID', 'Case_Name', 'Case_Desc', 'Status', 'Thresh_min', 'Thresh_max'], 'required'],
            [['Case_ID'], 'integer'],
            [['Case_Desc', 'Status'], 'string'],
            [['Thresh_min', 'Thresh_max'], 'number'],
            [['Case_Name'], 'string', 'max' => 60],
            [['Case_ID'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Case_ID' => 'Case ID',
            'Case_Name' => 'Case Name',
            'Case_Desc' => 'Case Desc',
            'Status' => 'Status',
            'Thresh_min' => 'Thresh Min',
            'Thresh_max' => 'Thresh Max',
        ];
    }

    /**
     * Gets query for [[PatientRequests]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPatientRequests()
    {
        return $this->hasMany(PatientRequest::className(), ['Estimated_COVID' => 'Case_ID']);
    }
}
