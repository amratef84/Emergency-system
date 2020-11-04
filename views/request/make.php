<?php

use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\controllers\MakeRController;
use yii\bootstrap\DatePicker;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\grid\CheckBoxColumn;
use yii\data\ActiveDataProvider;
use app\models\PatientRequest;
use app\models\Symptoms;
use app\models\SymptomsGroup;
use app\models\PatientSensorsData;
use app\models\Sensor;
use yii\helpers\Html;
use yii\db\Query;
use app\models\Patient;
use app\models\PatientScreening;

$this->title = 'Patient Request';
$this->params['breadcrumbs'][]=['label' => 'List of Patient'];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="patient-view">


<?php
//$id = Yii::$app->request->get('id');
//$requestedID = Patient::findOne($id)->Patient_Id;   
?>

    

</div>





 <?php $form = ActiveForm::begin([
                    'id' => 'viaggio',
                     'validateOnSubmit' => false,
                    /*'enableAjaxValidation'   => true,
                    'enableClientValidation' => false,*/
]); ?>
<?php

?>
<center>
<div  class = "row">
    <div  class = "col-lg-1"></div>
   <div  class = "col-lg-10">
       

    <h2><strong>Patient Information</strong></h2>

  <br>

<?php
	 $dataProvider = new ActiveDataProvider([
	  //'SELECT Symp_ID, Symp_name, Score FROM symptoms' 
    'query' => $model,

    
	
]);
      
	
 echo GridView::widget([
  'id' => 'grid',
    'dataProvider' => $dataProvider,
	
	'columns'=>[
	  /**	[
		 'label'=>'Request ID',
            'class' => 'yii\grid\DataColumn',
             'attribute'=>'Request_Id',	
            'value' => function ($data) {
                return $data->Request_Id; 
            },
        ],
		*/
		
		
       	  	 [
		 'label'=>'Patient ID',
            'class' => 'yii\grid\DataColumn',
             'attribute'=>'Patient_Id',	
            'value' => function ($data) {
                return $data->Patient_Id; 
            },
        ],
        
        	  	 [
		 'label'=>'Request Type',
            'class' => 'yii\grid\DataColumn',
             'attribute'=>'Request_Type',	
            'value' => function ($data) {
                return $data->Request_Type; 
            },
        ],
        
        	  	 [
		 'label'=>'Request Date',
            'class' => 'yii\grid\DataColumn',
             'attribute'=>'RequestTime',	
            'value' => function ($data) {
                return $data->RequestTime; 
            },
        ],
]
	
]);
?>     
       <br>
       <!-- <hr width="1000px" style="border: 1px groove black;"> -->
       <hr width="1000px">
       <br>
  
	<!--<?//= $form->field($model2, 'RequestTime')->input('date') ?>-->

 

<h2><strong>Sensors' Readings</strong></h2>
	<br>
<?php
	 $dataProvider = new ActiveDataProvider([
	  
    'query' =>$sensorData
,    
	
]);
       


 echo GridView::widget([
  'id' => 'grid',
    'dataProvider' => $dataProvider,
	
	'columns'=>[
	  	 [
		 'label'=>'Sensor ID',
            'class' => 'yii\grid\DataColumn',
             'attribute'=>'ID',	
            'value' => function ($data) {
                return $data->SensorID; 
            },
        ],
		
		[
        'label'=>'Sensor Name',
        'attribute'=>'SensorName',
        'value'=> function($model){
        $Sensor= app\models\Sensor::find()->where(['SensorID'=>$model->SensorID])->one();
        return $Sensor->SensorName;
        }
      ],
	  [

        'label'=>'Min Value',
        'attribute'=>'Min_Value',
        'value'=> function($model){
        $Sensor= app\models\Sensor::find()->where(['SensorID'=>$model->SensorID])->one();
        return $Sensor->Min_Value;
        }
      ],
	  [
        'label'=>'Max Value',
        'attribute'=>'Max_Value',
        'value'=> function($model){
        $Sensor= app\models\Sensor::find()->where(['SensorID'=>$model->SensorID])->one();
        return $Sensor->Max_Value;
        }
      ],
	  [
	'label'=>'Value',
    'attribute' => 'Value',
    'value' => function($data){
         $Sensor= app\models\Sensor::find()->where(['SensorID'=>$data->SensorID])->one();
        return Html::textInput('sensor_value'.$data->SensorID,$data->Value,['type' => 'number','lang'=>'en-EN','step'=>'.01','min'=>$Sensor->Min_Value,'max'=>$Sensor->Max_Value]);
    },
    'format' => 'raw'
],
	 /** [
	   'label'=>'Value',
            'class' => 'yii\grid\DataColumn',
             'attribute'=>'Value',			
            'value' => function ($data) {
                return $data->Value; 
            },
        ],
		*/
		
	],
	//['class' => 'yii\grid\TextboxColumn','header'=>'Value','name'=> 'checked'],
	
]);
?>
	
       <br>
       <!-- <hr width="1000px" style="border: 1px groove black;"> -->
       <hr width="1000px">
       <br>
       
<h2><strong>Symptoms table</strong></h2>
	<br>

<?php
	 $dataProvider = new ActiveDataProvider([
	  //'SELECT Symp_ID, Symp_name, Score FROM symptoms' 
    'query' =>$symptomsData,

    
	
]);
 echo GridView::widget([
  'id' => 'grid',
    'dataProvider' => $dataProvider,
	
	'columns'=>[
	  	 /* [
		 'label'=>'Symptoms ID',
            'class' => 'yii\grid\DataColumn',
             'attribute'=>'ID',	
            'value' => function ($data) {
                return $data->Symp_ID; 
            },
        ], */
		
		[
        'label'=>'Group',
        'attribute'=>'Group_ID',
        'value'=> function($model){
        $SymptomsGroup= app\models\SymptomsGroup::find()->where(['Group_ID'=>$model->Symp_Group])->one();
        return $SymptomsGroup->GroupName;
        }
      ],
	  [
            'class' => 'yii\grid\DataColumn',
             'attribute'=>'Symptoms',			
            'value' => function ($data) {
                return $data->Symp_name; 
            },
        ],
		[
		 'label'=>'Description',
            'class' => 'yii\grid\DataColumn',
             'attribute'=>'Symp_desc',	
            'value' => function ($data) {
                return $data->Symp_desc; 
            },
        ],
		 [
        'label'=>'ScoringType',
        'attribute'=>'ScoringType',
        'value'=> function($model){
        $SymptomsGroup= app\models\SymptomsGroup::find()->where(['Group_ID'=>$model->Symp_Group])->one();
        return $SymptomsGroup->ScoringType;
        }
      ],
		 [
            'class' => 'yii\grid\DataColumn',
             'attribute'=>'Score',			
            'value' => function ($data) use($request_id) {
			
		 $modelr = PatientRequest::find()->FilterWhere(['=','Request_Id',$request_id]);
				$birthDate =app\models\Patient::findOne($modelr->one()->Patient_Id)->DateofBirth;
              
               //calulate patient age
                $birthDate = explode("-", $birthDate);
                $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[2], $birthDate[1], $birthDate[0]))) > date("md")
                ? ((date("Y") - $birthDate[0]) - 1)
                : (date("Y") - $birthDate[0]));
				if($age>=14){
					
                return $data->AdultScore; }
				else{
				return $data->pediatric_score;}
            },
        ],
	
     
	
     [
	'label'=>'Value',
    'attribute' => 'Value',
    'value' => function($data) use ($request_id){
        $val = PatientScreening::find()->where('Request_Id = :ri',[':ri'=>$request_id])->andWhere('Symp_ID = :si',[':si'=>$data->Symp_ID])->one()->Value;
        if($val == "Y")
        return Html::checkbox('sym_value'.$data->Symp_ID,true);
        else
        return Html::checkbox('sym_value'.$data->Symp_ID,false);
    },
    'format' => 'raw'
],
	
	],
	
]);
?>
  

  
  <div class = "form-group">
  <br>
         <?= Html::submitButton('Submit', ['class' =>'btn btn-primary', 'name' => 'submit','value'=>'submit']) ?>
        &nbsp;&nbsp;
      <a href="<?= Url::to(['request/cancel','request_id' =>$request_id])?>" style="background-color:darkred ; border-color:darkred" class="btn btn-primary">Cancel</a>
      </div>
      <?php ActiveForm::end(); ?>
   </div>
       <div  class = "col-lg-1"></div>
</div>
</center>

<style>

input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    /* display: none; <- Crashes Chrome on hover */
    -webkit-appearance: none;
    margin: 0; /* <-- Apparently some margin are still there even though it's hidden */
}

input[type=number] {
    -moz-appearance:textfield; /* Firefox */
}

</style>