<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "systemparameters".
 *
 * @property int $SP_id
 * @property string $SP_item
 * @property int $SP_value
 * @property string|null $description
 */
class Systemparameters extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'systemparameters';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['SP_item', 'SP_value'], 'required'],
            [['SP_value'], 'integer'],
            [['SP_item', 'description'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'SP_id' => Yii::t('app', 'System Parameter ID'),
            'SP_item' => Yii::t('app', 'System Parameter Item'),
            'SP_value' => Yii::t('app', 'System Parameter Value'),
            'description' => Yii::t('app', 'Description'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return SystemparametersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SystemparametersQuery(get_called_class());
    }
}
