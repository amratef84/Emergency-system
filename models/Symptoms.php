<?php

namespace app\models;

use Yii;


class Symptoms extends \yii\db\ActiveRecord
{
    
    public static function tableName()
    {
        return 'kacst.symptoms';
    }

     

    public function rules()
    {
        return [
            [[ 'Symp_Group', 'Symp_name', 'Symp_desc', 'Score', 'AdultScore', 'pediatric_score','Type','Target', 'Status'], 'required'],
         [['Symp_ID', 'Symp_Group', 'Score', 'AdultScore'], 'integer'],
           [['pediatric_score'], 'number'],
            [['Symp_Group','Score'], 'integer','max'=>30],
            [['AdultScore','pediatric_score'], 'number'],
            [['Symp_desc', 'Status','Target', 'Type'], 'string'],
            [['Symp_name'], 'string', 'max' => 11],
			 [['Symp_ID'], 'unique'],

                     
        ];
    }

    
    public function attributeLabels()
    {
        return [
            'Symp_ID' => 'Symptom ID',
            'Symp_Group' => 'Group',
            'Symp_name' => 'Name',
            'Symp_desc' => 'Description',
            'Score' => 'Score',
            'AdultScore' => 'Adult Score',
            'pediatric_score' => 'pediatric Score',
            'Type' => 'Type',
            'Target' => 'Target',
            'Status' => 'Status',
        ];
    }
    public function IdCount(){
           $max = Yii::$app->db->createCommand('SELECT max(Symp_ID) as max FROM kacst.symptoms')->queryScalar();
          return ($max+1);}

   
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHospitalScreenings()
    {
        return $this->hasMany(HospitalScreening::className(), ['Symp_ID' => 'Symp_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHospitalScreenings0()
    {
        return $this->hasMany(HospitalScreening::className(), ['Symp_ID' => 'Symp_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatientScreenings()
    {
        return $this->hasMany(PatientScreening::className(), ['Symp_ID' => 'Symp_ID']);
    } 
}
