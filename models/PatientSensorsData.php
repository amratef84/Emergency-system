<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "patient_sensors_data".
 *
 * @property int $Request_Id
 * @property int $SensorID
 * @property float $Value
 * @property string $Time
 *
 * @property PatientRequest $request
 * @property Sensor $sensor
 */
class PatientSensorsData extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'patient_sensors_data';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Request_Id', 'SensorID', 'Value', 'Time'], 'required'],
            [['Request_Id', 'SensorID'], 'integer'],
            [['Value'], 'number'],
            [['Time'], 'safe'],
            [['Request_Id'], 'exist', 'skipOnError' => true, 'targetClass' => PatientRequest::className(), 'targetAttribute' => ['Request_Id' => 'Request_Id']],
            [['SensorID'], 'exist', 'skipOnError' => true, 'targetClass' => Sensor::className(), 'targetAttribute' => ['SensorID' => 'SensorID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Request_Id' => 'Request ID',
            'SensorID' => 'Sensor ID',
            'Value' => 'Value',
            'Time' => 'Time',
        ];
    }

    /**
     * Gets query for [[Request]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRequest()
    {
        return $this->hasOne(PatientRequest::className(), ['Request_Id' => 'Request_Id']);
    }


    /**
     * Gets query for [[Sensor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSensor()
    {
        return $this->hasOne(Sensor::className(), ['SensorID' => 'SensorID']);
    }
}
