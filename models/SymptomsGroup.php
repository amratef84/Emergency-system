<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "symptomsgroups".
 *
 * @property int $Group_ID
 * @property string $GroupName
 * @property string $GroupDesc
 * @property string $ScoringType
 * @property string $Cat_Desc
 * @property string $Status
 */
class SymptomsGroup extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'symptomsgroups';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [ ['GroupName', 'GroupDesc', 'ScoringType', 'Cat_Desc', 'Status'], 'required'],
           
            [['Status'], 'string'],
			[['ScoringType'], 'string'],
            [['GroupName'], 'string', 'max' => 30],
            [['GroupDesc', 'Cat_Desc'], 'string', 'max' => 100],
            
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Group_ID' => 'Group ID',
            'GroupName' => 'Group Name',
            'GroupDesc' => 'Group Desc',
            'ScoringType' => 'Scoring Type',
            'Cat_Desc' => 'Cat Desc',
            'Status' => 'Status',
        ];
    }
    public function IdCount(){
           $max = Yii::$app->db->createCommand('SELECT max(Group_ID) as max FROM symptomsgroups')->queryScalar();
          return ($max+1);}

}
