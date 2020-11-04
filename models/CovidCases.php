<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "covid_cases".
 *
 * @property int $Patient_Id
 * @property int $Covid_Status
 * @property string $Date
 * @property string $Case_Status
 *
 * @property RegisteredPatientAccount $patient
 */
class CovidCases extends \yii\db\ActiveRecord
{
  /**
   * {@inheritdoc}
   */
  public static function tableName()
  {
    return 'covid_cases';
  }

  /**
   * {@inheritdoc}
   */
  public function rules()
  {
    return [
      [['Covid_Status', 'Date', 'Case_Status'], 'required'],
      [['Covid_Status'], 'integer'],
      [['Date'], 'safe'],
      [['Case_Status'], 'string'],
      [['Patient_Id'], 'exist', 'skipOnError' => true, 'targetClass' => RegisteredPatientAccount::className(), 'targetAttribute' => ['Patient_Id' => 'Patient_Id']],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function attributeLabels()
  {
    return [
      'Patient_Id' => 'Patient ID',
      'Covid_Status' => 'Covid Status',
      'Date' => 'Date',
      'Case_Status' => 'Case Status',
    ];
  }

  /**
   * Gets query for [[Patient]].
   *
   * @return \yii\db\ActiveQuery
   */
  public function getPatient()
  {
    return $this->hasOne(RegisteredPatientAccount::className(), ['Patient_Id' => 'Patient_Id']);
  }

  public static function getCasesCount($case=null){
    if($case){
      if($case == 'positive'){
        $code = '30';
      }elseif($case == 'suspected'){
        $code = '10';
      }elseif($case == 'negative'){
        $code = '20';
      }elseif($case == 'recovered'){
        $code = '40';
      }else{
        return count(self::find()->all());
      }
      return count(self::find()->where(['Covid_Status' => $code])->all());
    }else{
      return count(self::find()->where('')->all());
    }
  }

}
