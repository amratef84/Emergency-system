<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "symsen".
 *
 * @property int $ID
 * @property int $Sen_ID
 * @property int|null $Rang_Min
 * @property int|null $Rang_Max
 * @property int $Sym_ID
 *
 * @property Sensor $sen
 * @property Symptom $sym
 */
class Symsen extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'symsen';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Sen_ID', 'Sym_ID'], 'required'],
            [['Sen_ID', 'Rang_Min', 'Rang_Max', 'Sym_ID'], 'integer'],
            [['Sen_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Sensor::className(), 'targetAttribute' => ['Sen_ID' => 'SensorID']],
            [['Sym_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Symptoms::className(), 'targetAttribute' => ['Sym_ID' => 'Symp_ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'Sen_ID' => Yii::t('app', 'Sensor ID'),
            'Rang_Min' => Yii::t('app', 'Min Value'),
            'Rang_Max' => Yii::t('app', 'Max Value'),
            'Sym_ID' => Yii::t('app', 'Symptom ID'),
        ];
    }

    /**
     * Gets query for [[Sen]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getSen()
    {
        return $this->hasOne(Sensor::className(), ['SensorID' => 'Sen_ID']);
    }

    /**
     * Gets query for [[Sym]].
     *
     * @return \yii\db\ActiveQuery|SymptomQuery
     */
    public function getSym()
    {
        return $this->hasOne(Symptoms::className(), ['Symp_ID' => 'Sym_ID']);
    }

    /**
     * {@inheritdoc}
     * @return SymsenQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SymsenQuery(get_called_class());
    }
}
