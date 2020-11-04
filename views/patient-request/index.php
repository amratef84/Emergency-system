<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use yii\grid\GridView;
use yii\Controllers\PatientRequestController;
use yii\Controllers\PatientMedicalHistoryController;
use app\models\PatientSensorsData;
use yii\Controllers\SiteController;
use app\models\PatientRequest;
use app\models\Category;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PatientRequestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Patient Current Requests';

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-request-index">
<div class="container">
    <h1>Current <?= Html::encode($this->title) ?></h1>
<?php $form = ActiveForm::begin(['id' => 'patientrequest','class'=>'form-horizontal']); ?> 
          <div class="form-layout">
            <div class="row mg-b-25">
                <div class="col-lg-3">
                <div class="form-group">
                  <label class="form-control-label">Request Status</label> 
                 <?=Html::activeDropDownList($model_filter,'Request_Status',
               ArrayHelper::map(PatientRequest::find()->where('Request_Id=0')->all(), 'id','name'),['class' =>'form-control','id'=>'select_status'])?>
			   </div>
              </div> 
                
                  <div class="col-lg-2">
                <div class="form-group">
                    <button style="margin-top:31px;" type="submit" class="btn btn-primary bd-0">Filter</button>
              </div>  
      
            </div><!-- row -->
          </div>
		  </div>
              <?php ActiveForm::end(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
          //  ['class' => 'yii\grid\SerialColumn'],
            
            'Request_Id',        
            'Patient_Id',
			[
                'label'=>'Patient FName',
                'attribute'=>'Patient_Id',
                'value'=>'names.Patient_FName',              

            ],
            'RequestTime',
            'Request_Status',
            'Request_Type',

            ['class' => 'yii\grid\ActionColumn', 
            'template' => ' {send}',
            'buttons' => [
                'send' => function($url, $model){
                     return Html::a('<button class="btn btn-info">View</button>', ['patient-request/send', 'id' => $model->Patient_Id , 'req_id' => $model->Request_Id]);//Request_Id $req_id
                            }     ]           
            ],
        ],
    ]); 
    ?>

    <?php //echo "Controller: " . Yii::$app->controller->id; //current controller id ?>
    <?php //echo "   Action : " . Yii::$app->controller->action->id; //current controller action id ?>
</div>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  $(function(){
     var op1 = '<option value="">All</option>';
     var op2 = '<option value="Rejected">Rejected</option>';
     var op3 = '<option value="Admitted">Admitted</option>';
     var op4 = '<option value="Responed">Responed</option>';
     var op5 = '<option value="PendingAsk">PendingAsk</option>';
     var op6 = '<option value="autoAllowable">autoAllowable</option>';
     var op7 = '<option value="autoPending">autoPending</option>';
     var op8 = '<option value="autoReject">autoReject</option>';   
     $('#select_status').append(op1);
     $('#select_status').append(op2);
     $('#select_status').append(op3);
     $('#select_status').append(op4);
     $('#select_status').append(op5);
     $('#select_status').append(op6);
     $('#select_status').append(op7);
     $('#select_status').append(op8);   
     $('#select_status').val("<?php echo $selected_request_status?>");
 
});

</script>