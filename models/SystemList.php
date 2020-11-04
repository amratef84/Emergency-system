<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "system_list".
 *
 * @property int $Item_id
 * @property string $Item
 * @property int $Group_id
 * @property string $Group_name
 */
class SystemList extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'system_list';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Item', 'Group_id'], 'required'],
            [['Group_id'], 'integer'],
            [['Item', 'Group_name'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Item_id' => 'Item ID',
            'Item' => 'Item',
            'Group_id' => 'Group ID',
            'Group_name' => 'Group Name',
        ];
    }
    public function IdCount(){
           $max = Yii::$app->db->createCommand('SELECT max(Item_id) as max FROM system_list')->queryScalar();
          return ($max+1);}

}
