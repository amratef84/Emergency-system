<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kacst.hospital_employee".
 *
 * @property int $employee_ID
 * @property string $employee_Type
 * @property string $employee_Email
 * @property string $JopTitle
 * @property int $Hosp_Id
 * @property string $Status
 */
class HospitalEmployee extends \yii\db\ActiveRecord
{
  /**
   * {@inheritdoc}
   */
  public static function tableName()
  {
    return 'hospital_employee';
  }

  /**
   * {@inheritdoc}
   */
  public function rules()
  {
    return [
      [[ 'employee_ID','employee_name','employee_Type', 'JopTitle', 'Hosp_id', 'Status'], 'safe'],
      [['Hosp_id'], 'integer'],
      [['employee_Type','employee_name','JopTitle', 'Status'], 'string'],

    ];
  }

  /**
   * {@inheritdoc}
   */
  public function attributeLabels()
  {
    return [
      'employee_ID' => 'Employee ID',
      'employee_name' => 'Employee Name',
      'employee_Type' => 'Employee Type',
      'JopTitle' => 'Jop Title',
      'Hosp_id' => 'Hospital Name',
      'Status' => 'Status',
    ];
  }

  public function getHospital()
  {
    return $this->hasOne(hospital::className(), ['Hosp_id' => 'Hosp_id']);
  }


}
