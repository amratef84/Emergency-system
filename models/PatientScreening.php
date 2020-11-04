<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "patient_screening".
 *
 * @property int $Request_Id
 * @property int $Symp_ID
 * @property string $Value
 * @property string $SensorResult
 *
 * @property PatientRequest $request
 * @property Symptoms $symp
 */
class PatientScreening extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'patient_screening';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Symp_ID', 'Value', 'SensorResult'], 'required'],
            [['Symp_ID'], 'integer'],
            [['Value', 'SensorResult','ByDone'], 'string'],
            [['Request_Id'], 'exist', 'skipOnError' => true, 'targetClass' => PatientRequest::className(), 'targetAttribute' => ['Request_Id' => 'Request_Id']],
            [['Symp_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Symptoms::className(), 'targetAttribute' => ['Symp_ID' => 'Symp_ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Request_Id' => 'Request ID',
            'Symp_ID' => 'Symp ID',
            'Value' => 'Value',
            'SensorResult' => 'Sensor Result',
            'ByDone' => 'By Done',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequest()
    {
        return $this->hasOne(PatientRequest::className(), ['Request_Id' => 'Request_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSymp()
    {
        return $this->hasOne(Symptoms::className(), ['Symp_ID' => 'Symp_ID']);
    }
}
