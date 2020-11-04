<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Category;
use app\models\PatientRequest;
use app\models\HospitalSession;
use app\models\RegisteredPatientAccount;
use app\models\Unitt;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\grid\ActionColumn;
use app\models\CovidCatagory;

/* @var $this yii\web\View */
/* @var $searchModel app\models\HospitalSessionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hospital Sessions';
$this->params['breadcrumbs'][] = ['label' => 'View Unit', 'url' => ['../unitt/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hospital-session-index">

    <h1><?= 'Patient in '.$unit_name.' unit' ?></h1>
  
  <br>

  

    <?php $form = ActiveForm::begin(['id' => 'hospitalsession','class'=>'form-horizontal']); ?> 
          <div class="form-layout">
            <div class="row mg-b-25">
                <div class="col-lg-3">
                <div class="form-group">
                  
                   <?= $form->field($model_filter, 'Session_status')->dropdownList(HospitalSession::find()->select(['Session_status'])->indexBy('Session_status')
                     ->column(),
                     ['class' =>'form-control','id'=>'select_session']
                     ); ?>

             </div>
              </div> 
                
                  <div class="col-lg-2">
                <div class="form-group">
                    <button style="margin-top:31px;" type="submit" class="btn btn-primary bd-0">Filter</button>
              </div>  
      
            </div><!-- row -->
          </div><!-- form-layout -->
            

  <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
	
	'columns'=>[
      'Session_ID',
        [
		 'label'=>'Patient Id',
            'class' => 'yii\grid\DataColumn',
             'attribute'=>'Request_Id',	
            'value' => function ($data) {
                $p_id = PatientRequest::findOne($data->Request_Id)->Patient_Id;
              return $p_id; 
            },
        ],
      
            
          [
		 'label'=>'Patient Name',
            'class' => 'yii\grid\DataColumn',
             'attribute'=>'Request_Id',	
            'value' => function ($data) {
                $p_id = PatientRequest::findOne($data->Request_Id)->Patient_Id;
                $patient = RegisteredPatientAccount::findOne($p_id);
                $name = $patient->Patient_FName.' '.$patient->Patient_LName;
                return $name; 
            },
        ],
        
       [
		 'label'=>'Unit name',
            'class' => 'yii\grid\DataColumn',
             'attribute'=>'Unit_id',	
            'value' => function ($data) {
                $unit_name = Unitt::findOne($data->Unit_id)->Unit_name;
                return $unit_name; 
            },
        ],
        
       [
		 'label'=>'Category',
            'class' => 'yii\grid\DataColumn',
             'attribute'=>'Cat_ID',	
            'value' => function ($data) {
                $cat_name = Category::findOne($data->Cat_ID)->Cat_name;
                return $cat_name; 
            },
        ],
        
             [
		 'label'=>'Covid Catagory',
            'class' => 'yii\grid\DataColumn',
             'attribute'=>'Covid_status',	
            'value' => function ($data) {
              $catname = CovidCatagory::findOne($data->Covid_status)->Case_Name;
                return $catname; 
            },
        ],
          
             [
		 'label'=>'Calculated score',
            'class' => 'yii\grid\DataColumn',
             'attribute'=>'calculated_Score',	
            'value' => function ($data) {
                return $data->calculated_Score; 
            },
        ],
        
         [
		 'label'=>'Patient status',
            'class' => 'yii\grid\DataColumn',
             'attribute'=>'patient_status',	
            'value' => function ($data) {
                return $data->patient_status; 
            },
        ],
        
          [
		 'label'=>'Session status',
            'class' => 'yii\grid\DataColumn',
             'attribute'=>'Session_status',	
            'value' => function ($data) {
                return $data->Session_status; 
            },
        ],
        
           /* ['class' => 'yii\grid\ActionColumn',             
            'template' => ' {send}',
            'buttons' => [
                'send' => function($url, $data){
                   $p_id = PatientRequest::findOne($data->Request_Id)->Patient_Id;
                     return Html::a('<button class="btn btn-info">View</button>', ['hs/send', 'id' => $p_id->Patient_Id , 'req_id' => $data->Request_Id]);//Request_Id $req_id
                            }     ]           
            ], */
        
          ['class' => 'yii\grid\ActionColumn',             
            'template' => ' {view}',
            'buttons' => [
                'view' => function($url,$data){
                     $p_id = PatientRequest::findOne($data->Request_Id)->Patient_Id;
                      //return Html::a('<button class="btn btn-info">view</button>',['Hs/view', 'id' => 12]);//Request_Id $req_id
                  return Html::a('View', ['info_patient', 'id' => $p_id ,'Unit_id'=>$data->Unit_id], ['class' => 'btn btn-info']); 
                      /* return Html::a('<button id="" class="btn btn-info view" name="view">View</button>',Url::to(['view','id' =>12 /*$data->Patient_Id]));*/
                            }    
                   ]           
            ],
          
 /*           ['class' => 'yii\grid\ActionColumn',
             
              'template' => '{view}', 
             
       'buttons' => [
                 'view' => function($url,$data)   {
                   // $p_id = PatientRequest::findOne($data->Request_Id)->Patient_Id;
                    // return Html::a('<button class="btn btn-success">view</button>',Url::to(['employee/patient_info','id'=>$p_id]));
						//$p_id=15;
						//return Html::a('<button class="btn btn-success">view</button>',Url::to(['employee/patient_info','id'=>15]));
						return /*Html::a('<button class="btn btn-info">view</button>',Url::to(['view','id'=>$data->Session_ID]));
            Html::a('View', ['view', 'id' => $data->Session_ID], ['class' => 'btn btn-info']);
                    },
			 ] 
          ]*/
        
       ]
	
]);
?>
    <center>      
   <?=  Html::a('<button class="btn btn-info">Report</button>',Url::to(['#']));
   
?> 

            </center>
  <?php ActiveForm::end(); ?>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  $(function(){
var op1 = '<option value="0">All</option>';
     $('#select_session').append(op1);
     $('#select_session').val("<?php echo $selected_session_status?>");
 
});

</script>