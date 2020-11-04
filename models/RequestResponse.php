<?php
   namespace app\models;
   use Yii;
   use yii\base\Model;
   class RequestResponse extends \yii\db\ActiveRecord {
    
	  
	  public static function tableName()   
    {   
        return 'request_respond';   
    }
	
	public function rules(){
		
		return[
	[['Request_Id' ,
	'caluculated_score',
	'estimated_category' ,
	'respond_state',
            'responseTime' ,
			'responseRype' ,
			'delvirey_state',
			],'safe']];
	}
   }
	
	?>