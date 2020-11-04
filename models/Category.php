<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $Cat_ID
 * @property string $Cat_code
 * @property string $Cat_name
 * @property string $Cat_color
 * @property string $Cat_desc
 * @property float $score_criteria
 * @property string $Comp_sign
 * @property string $Status
 * @property float $Thresh_min
 * @property float $Thresh_max
 *
 * @property CatUnit[] $catUnits
 * @property HospitalSession[] $hospitalSessions
  */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
     public function rules()
    {
        return [
            [['Cat_ID', 'Cat_code', 'Cat_name', 'Cat_color', 'Cat_desc', 'Status'], 'safe'],
            [['Cat_ID'], 'integer'],
            [['Cat_desc', 'Status'], 'string'],
            [['Cat_code', 'Cat_name', 'Cat_color'], 'string', 'max' => 30],
            [['Cat_ID'], 'unique'],
        ];
    }

   const AdviceCatogry1 = 'Please follow your doctor instructions carefully';
   const AdviceCatogry2 = 'Please take the treatment at the designated times';

     public function Advice1(){
          return 'Please follow your doctor instructions carefully'; /*AdviceCatogry1;*/
      }
      public function Advice2(){
          return 'Please take the treatment at the designated times'; /*AdviceCatogry2;*/
      }
      
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Cat_ID' => 'Cat ID',
            'Cat_code' => 'Cat Code',
            'Cat_name' => 'Cat Name',
            'Cat_color' => 'Cat Color',
            'Cat_desc' => 'Cat Desc',
            'Status' => 'Status',
            'Thresh_min' => 'Thresh Min',
            'Thresh_max' => 'Thresh Max',
        ];
    }

    /**
     * Gets query for [[CatUnits]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCatUnits()
    {
        return $this->hasMany(CatUnit::className(), ['Cat_ID' => 'Cat_ID']);
    }

    /**
     * Gets query for [[HospitalSessions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHospitalSessions()
    {
        return $this->hasMany(HospitalSession::className(), ['Cat_ID' => 'Cat_ID']);
    }

    public function IdCount(){
           $max = Yii::$app->db->createCommand('SELECT max(Cat_ID) as max FROM category')->queryScalar();
          return ($max+1);}
}
