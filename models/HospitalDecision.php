<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hospital_decision".
 *
 * @property int $decision_id
 * @property string $value
 * @property int $Type_id
 * @property string $Type_name
 */
class HospitalDecision extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hospital_decision';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['decision_id', 'value', 'Type_id', 'Type_name'], 'required'],
            [['decision_id', 'Type_id'], 'integer'],
            [['value', 'Type_name'], 'string', 'max' => 30],
            [['decision_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'decision_id' => 'Decision ID',
            'value' => 'Value',
            'Type_id' => 'Type ID',
            'Type_name' => 'Type Name',
        ];
    }
}
