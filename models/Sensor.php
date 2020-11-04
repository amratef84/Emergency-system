<?php
namespace app\models;
   use Yii;
   use yii\base\Model;

class Sensor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sensor';
    }

    /**
     * {@inheritdoc}
     */
	 public function attributeLabels()
    {
        return [
            'SensorID' => 'Sensor ID',
            'SensorName' => 'Sensor Name',
            'Sensor_descr' => 'Sensor Descr',
            'Linked' => 'Linked',
            'Status' => 'Status',
            'Min_Value' => 'Min Value',
            'Max_Value' => 'Max Value',
            'Thershold' => 'Thershold',
            'comparison_sign' => 'Comparison Sign',
        ];
    }
	
	 public function getSen(){
		   $sql='SELECT SensorName,  Min_Value, Max_Value FROM sensor';
		  return array(Sensor::findBysql($sql)->all());
	  }
	
	
   public function rules()
    {
        return [
            [['SensorName', 'Sensor_descr', 'Linked', 'Status', 'Min_Value', 'Max_Value', 'Thershold', 'comparison_sign'], 'safe'],
            [['Status', 'comparison_sign'], 'string'],
            [['Min_Value', 'Max_Value', 'Thershold'], 'number'],
            [['SensorName'], 'string', 'max' => 30],
            [['Sensor_descr'], 'string', 'max' => 100],
            [['Linked'], 'string', 'max' => 1],
        ];
    }
	 public function getPatientSensorsDatas()
    {
        return $this->hasMany(PatientSensorsData::className(), ['SensorID' => 'SensorID']);
    }

    /**
     * {@inheritdoc}
     */
       /**
     * Gets query for [[MonitorSensorsDatas]].
     *
     * @return \yii\db\ActiveQuery
     */
  /**  public function getMonitorSensorsDatas()
    {
        return $this->hasMany(MonitorSensorsData::className(), ['SensorID' => 'SensorID']);
    }
	*/

    /**
     * Gets query for [[PatientSensorsDatas]].
     *
     * @return \yii\db\ActiveQuery
     */
   /** public function getPatientSensorsDatas()
    {
        return $this->hasMany(PatientSensorsData::className(), ['SensorID' => 'SensorID']);
    }
	*/


}
?>
