<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "unit".
 *
 * @property int $Unit_id
 * @property string $Unit_code
 * @property string $Unit_name
 * @property string $Unit_desc
 * @property int $Capacity
 * @property string $Type_of_resources
 * @property int $Hosp_id
 * @property int $Number_nurses
 * @property int $Number_doctors
 * @property int $Number_staff
 * @property string $Status
 * @property int $CurrentPatients
 * @property int $SavedPatient
 * @property int $AaitingPatient
 * @property int $admin_id
 * @property float $availability
 *
 * @property CatUnit[] $catUnits
 * @property EmployeePrivileges[] $employeePrivileges
 * @property HospitalSession[] $hospitalSessions
 */
class Unitt extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'unit';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Unit_code', 'Unit_name', 'Unit_desc', 'Capacity', 'Type_of_resources', 'Hosp_id', 'Number_nurses', 'Number_doctors', 'Number_staff', 'Status', 'CurrentPatients', 'ServedPatient', 'AdmittingPatient	', 'admin_id', 'availability'], 'required'],
            [['Unit_desc', 'Status'], 'string'],
            [['Capacity', 'Hosp_id', 'Number_nurses', 'Number_doctors', 'Number_staff', 'CurrentPatients', 'ServedPatient', 'AdmittingPatient	', 'admin_id'], 'integer'],
            [['availability'], 'number'],
            [['Unit_code', 'Unit_name', 'Type_of_resources'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Unit_id' => 'Unit ID',
            'Unit_code' => 'Unit Code',
            'Unit_name' => 'Unit Name',
            'Unit_desc' => 'Unit Desc',
            'Capacity' => 'Capacity',
            'Type_of_resources' => 'Type Of Resources',
            'Hosp_id' => 'Hosp ID',
            'Number_nurses' => 'Number Nurses',
            'Number_doctors' => 'Number Doctors',
            'Number_staff' => 'Number Staff',
            'Status' => 'Status',
            'CurrentPatients' => 'Current Patients',
            'ServedPatient' => 'ServedPatient',
            'AdmittingPatient' => 'AdmittingPatient',
            'admin_id' => 'Admin ID',
            'availability' => 'Availability',
        ];
    }

    /**
     * Gets query for [[CatUnits]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCatUnits()
    {
        return $this->hasMany(CatUnit::className(), ['Unit_id' => 'Unit_id']);
    }

    /**
     * Gets query for [[EmployeePrivileges]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmployeePrivileges()
    {
        return $this->hasMany(EmployeePrivileges::className(), ['Unit_id' => 'Unit_id']);
    }

    /**
     * Gets query for [[HospitalSessions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHospitalSessions()
    {
        return $this->hasMany(HospitalSession::className(), ['Unit_id' => 'Unit_id']);
    }
}
