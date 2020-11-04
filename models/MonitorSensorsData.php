<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "monitor_sensors_data".
 *
 * @property int $Request_Id
 * @property int $SensorID
 * @property float $Value
 * @property string $Time
 *
 * @property PatientRequest $request
 * @property Sensor $sensor
 */
class MonitorSensorsData extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'monitor_sensors_data';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Session_ID', 'SensorID', 'Value', 'Time'], 'required'],
            [['Session_ID', 'SensorID'], 'integer'],
            [['Value'], 'number'],
            [['Time'], 'safe'],
            [['Session_ID'], 'exist', 'skipOnError' => true, 'targetClass' => HospitalSession::className(), 'targetAttribute' => ['Session_ID' => 'Session_ID']],
            [['SensorID'], 'exist', 'skipOnError' => true, 'targetClass' => Sensor::className(), 'targetAttribute' => ['SensorID' => 'SensorID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Session_ID' => 'Session ID',
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
    public function getSession()
    {
        return $this->hasOne(HospitalSession::className(), ['Session_ID' => 'Session_ID']);
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
