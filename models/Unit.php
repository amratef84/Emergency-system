<?php

namespace app\models;
use app\models\Hospital;
use Yii;

/**
 * This is the model class for table "kacst.unit".
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
 */
class Unit extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kacst.unit';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'Unit_code', 'Unit_name', 'Unit_desc', 'Capacity', 'Type_of_resources', 'Hosp_id', 'Number_nurses', 'Number_doctors', 'Number_staff', 'Status','CurrentPatients','ServedPatient', 'AdmittingPatient','admin_id', 'availability'], 'required'],
			[['Unit_id', 'Capacity', 'Hosp_id', 'Number_nurses', 'Number_doctors', 'Number_staff'], 'integer'],
            [[ 'Capacity', 'Hosp_id', 'Number_nurses', 'Number_doctors', 'Number_staff','CurrentPatients','ServedPatient', 'AdmittingPatient','admin_id','availability'], 'integer'],
            [['Unit_desc', 'Status'], 'string'],
            [['Unit_code', 'Unit_name', 'Type_of_resources'], 'string', 'max' => 30],
			[['Unit_id'], 'unique'],
            [['Hosp_id'], 'exist', 'skipOnError' => true, 'targetClass' => Hospital::className(), 'targetAttribute' => ['Hosp_id' => 'Hosp_id']],
          
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
            'Hosp_id' => 'Hosp Name',
            'Number_nurses' => 'Number Nurses',
            'Number_doctors' => 'Number Doctors',
            'Number_staff' => 'Number Staff',
            'Status' => 'Status',
            'CurrentPatients' => 'CurrentPatients',
            'ServedPatient' => 'ServedPatient',
            'AdmittingPatient' => 'AdmittingPatient', 
            'admin_id' => 'admin_id', 
            'availability' => 'availability', 
        ];
    }
    
        public static function getUnitsCount(){
        return count(self::find()->all());
  }
    
    public function getHospital()
      {
          
          return $this->hasOne(hospital::className(), ['Hosp_id' => 'Hosp_id']);
      }
	  /**
     * @return \yii\db\ActiveQuery
     */
    public function getHosp()
    {
        return $this->hasOne(Hospital::className(), ['Hosp_id' => 'Hosp_id']);
    }
      public function IdCount(){
           $max = Yii::$app->db->createCommand('SELECT max(Unit_id) as max FROM kacst.unit')->queryScalar();
          return ($max+1);}

}
