<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hospital_screening".
 *
 * @property int $Session_ID
 * @property int $Symp_ID
 * @property string $value
 *
 * @property Symptoms $symp
 * @property HospitalSession $session
 * @property Symptoms $symp0
 */
class HospitalScreening extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hospital_screening';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Session_ID', 'Symp_ID', 'value','TimeStamp'], 'required'],
            [['Session_ID', 'Symp_ID'], 'integer'],
            [['value','TimeStamp','ByDone'], 'string'],
            [['Symp_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Symptoms::className(), 'targetAttribute' => ['Symp_ID' => 'Symp_ID']],
            [['Session_ID'], 'exist', 'skipOnError' => true, 'targetClass' => HospitalSession::className(), 'targetAttribute' => ['Session_ID' => 'Session_ID']],            
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Session_ID' => 'Session ID',
            'Symp_ID' => 'Symp ID',
            'value' => 'Value',
            'TimeStamp'=>'Date',
            'ByDone' => 'By Done',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSymp()
    {
        return $this->hasOne(Symptoms::className(), ['Symp_ID' => 'Symp_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSession()
    {
        return $this->hasOne(HospitalSession::className(), ['Session_ID' => 'Session_ID']);
    }

}
