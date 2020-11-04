<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hospital_session".
 *
 * @property int $Session_ID
 * @property int $Request_Id
 * @property int $Ticket_ID
 * @property int $Cat_ID
 * @property string $patient_status
 * @property int $Hosp_decision
 * @property int $Unit_id
 * @property int $Covid_status
 * @property int $employee_ID
 * @property string $advices
 * @property float $calculated_Score
 * @property string $Session_status
 * @property string $Date
 *
 * @property HospitalScreening[] $hospitalScreenings
 * @property PatientRequest $request
 * @property Category $cat
 * @property HospitalEmployee $employee
 * @property Unit $unit
 * @property MonitorSensorsData[] $monitorSensorsDatas
 */
class Hs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hospital_session';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [/*['Session_ID', 'Request_Id', 'Ticket_ID', 'Cat_ID', 'patient_status', 'Hosp_decision', 'Unit_id', 'Covid_status', 'employee_ID', 'advices', 'calculated_Score', 'Session_status', 'Date'], 'required'],*/
            ['Session_status', 'Date'], 'required'],
            [['Session_ID', 'Request_Id', 'Ticket_ID', 'Cat_ID', 'Hosp_decision', 'Unit_id', 'Covid_status', 'employee_ID'], 'integer'],
            [['patient_status', 'advices', 'Session_status'], 'string'],
            [['calculated_Score'], 'number'],
            [['Date'], 'safe'],
            [['Session_ID'], 'unique'],
            [['Request_Id'], 'exist', 'skipOnError' => true, 'targetClass' => PatientRequest::className(), 'targetAttribute' => ['Request_Id' => 'Request_Id']],
            [['Cat_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['Cat_ID' => 'Cat_ID']],
            [['employee_ID'], 'exist', 'skipOnError' => true, 'targetClass' => HospitalEmployee::className(), 'targetAttribute' => ['employee_ID' => 'employee_ID']],
            [['Unit_id'], 'exist', 'skipOnError' => true, 'targetClass' => Unitt::className(), 'targetAttribute' => ['Unit_id' => 'Unit_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Session_ID' => 'Session ID',
            'Request_Id' => 'Request ID',
            'Ticket_ID' => 'Ticket ID',
            'Cat_ID' => 'Cat ID',
            'patient_status' => 'Patient Status',
            'Hosp_decision' => 'Hosp Decision',
            'Unit_id' => 'Unit ID',
            'Covid_status' => 'Covid Status',
            'employee_ID' => 'Employee ID',
            'advices' => 'Advices',
            'calculated_Score' => 'Calculated Score',
            'Session_status' => 'Session Status',
            'Date' => 'Date',
        ];
    }

    /**
     * Gets query for [[HospitalScreenings]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHospitalScreenings()
    {
        return $this->hasMany(HospitalScreening::className(), ['Session_ID' => 'Session_ID']);
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
     * Gets query for [[Cat]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCat()
    {
        return $this->hasOne(Category::className(), ['Cat_ID' => 'Cat_ID']);
    }

    /**
     * Gets query for [[Employee]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmployee()
    {
        return $this->hasOne(HospitalEmployee::className(), ['employee_ID' => 'employee_ID']);
    }

    /**
     * Gets query for [[Unit]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUnit()
    {
        return $this->hasOne(Unitt::className(), ['Unit_id' => 'Unit_id']);
    }

    /**
     * Gets query for [[MonitorSensorsDatas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMonitorSensorsDatas()
    {
        return $this->hasMany(MonitorSensorsData::className(), ['Session_ID' => 'Session_ID']);
    }
}