<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hospital_session".
 *
 * @property int $id
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
 *
 * @property HospitalEmployee $hospitalEmployee
 * @property HospitalScreening[] $hospitalScreenings
 * @property MonitorSensorsData $session
 * @property Category $cat
 * @property PatientRequest $request
 * @property Unit $unit
 */
class HospitalSession extends \yii\db\ActiveRecord
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
            [['Request_Id', 'Ticket_ID', 'Cat_ID', 'patient_status', 'Hosp_decision', 'Unit_id', 'reason', 'Covid_status', 'employee_ID', 'advices', 'calculated_Score', 'Session_status'], 'required'],
            [['Request_Id', 'Ticket_ID', 'Cat_ID', 'Hosp_decision', 'Unit_id', 'Covid_status', 'employee_ID'], 'integer'],
            [['patient_status', 'advices', 'Session_status'], 'string'],
            [['calculated_Score'], 'number'],
            [['reason'], 'string', 'max' => 255],
            [['Cat_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['Cat_ID' => 'Cat_ID']],
            [['Request_Id'], 'exist', 'skipOnError' => true, 'targetClass' => PatientRequest::className(), 'targetAttribute' => ['Request_Id' => 'Request_Id']],
            [['Unit_id'], 'exist', 'skipOnError' => true, 'targetClass' => Unit::className(), 'targetAttribute' => ['Unit_id' => 'Unit_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Session_ID' => 'Session ID',
            'Request_Id' => 'Request ID',
            'Ticket_ID' => 'Ticket ID',
            'Cat_ID' => 'Cat ID',
            'patient_status' => 'Patient Status',
            'Hosp_decision' => 'Hosp Decision',
            'Unit_id' => 'Unit ID',
            'Covid_status' => 'Covid Status',
            'employee_ID' => 'Employee ID',
			'reason'=> 'Reason',
            'advices' => 'Advices',
            'calculated_Score' => 'Calculated Score',
            'Session_status' => 'Session Status',
        ];
    }
 /**
     * @return \yii\db\ActiveQuery
     */
    public function getHospitalEmployee()
    {
        return $this->hasOne(HospitalEmployee::className(), ['employee_ID' => 'employee_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHospitalScreenings()
    {
        return $this->hasMany(HospitalScreening::className(), ['Session_ID' => 'Session_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCat()
    {
        return $this->hasOne(Category::className(), ['Cat_ID' => 'Cat_ID']);
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
    public function getUnit()
    {
        return $this->hasOne(Unit::className(), ['Unit_id' => 'Unit_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMonitorSensorsDatas()
    {
        return $this->hasMany(MonitorSensorsData::className(), ['Session_ID' => 'Session_ID']);
    }



}
