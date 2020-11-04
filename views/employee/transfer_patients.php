<?php
   use yii\helpers\Url;
   use yii\base\Model;
   use yii\helpers\Html;
   use yii\bootstrap\ActiveForm;
   use yii\helpers\ArrayHelper;
   use app\models\Unit;
   use yii\grid\GridView;
   use app\models\Category;
   use app\models\PatientRequest;
   use app\models\RegisteredPatientAccount;
   use yii\db\Query;
   use yii\db\Comand;
   use yii\data\ActiveDataProvider;
   use yii\controllers\MakeRController;
  use yii\Controllers\PatientMedicalHistoryController;
  use yii\web\Request;
  use yii\Controllers\PatientRequestController;
  use yii\Controllers\EmployeeController;
  use yii\Controllers\HospitalSessionController;
  use yii\web\Session;
  use app\models\Hospital;
  use app\models\Sensor;

/* @var $model app\models\SymptomsGroup */
/* @var $model app\models\RegisteredPatientAccount */
/*@var $model2 app\models\Unit */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = 'Transfer Patient’s';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="Transfer Patient’s">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

  
</div>
      <div class="container">
    <div class=" slim-mainpanel">
      <?php 
      $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data','id' => 'request','class'=>'form-horizontal']]); ?> 

    <div id="modaldemo3" class="modal fade">
      <div class="modal-dialog modal-dialog-vertical-center" role="document">
        <div class="modal-content bd-0 tx-14" style="background-color: #05080869;" >
               <div class="modal-header">
            <h6 id="m_qu" class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold"><?=Yii::t('app', 'Transfer to')?></h6>
            <button type="button" class=" close" data-dismiss="modal" aria-label="Close" >
              <span aria-hidden="false">&times;</span>
            </button>
          </div>    
          <div class="modal-body pd-25">
              
          <div class="form-layout">
            <div class="row mg-b-25">

                    <div hidden  class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label"><?= Yii::t('app', 'Id'); ?></label> 
                <?= $form->field($model, 'Patient_NId')->textInput(['class' => 'form-control','id'=>'ir'])->label(false)
                 ?> </div>      
                        </div>
                    <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label"><?= Yii::t('app', 'Unit'); ?></label>   
                 <?=Html::activeDropDownList($model,'Unit_id',
                ArrayHelper::map(Unit::find()->all(), 'Unit_id','Unit_name'),['class' =>'form-control'])?></div>
              </div> 
                
    
            </div><!-- row -->

            <div class="form-layout-footer">
            <center>  
            <p>   
              <button type="submit" class="btn btn-primary bd-0">transfer</button></p> 
            
                </center>  
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
              <?php // ActiveForm::end(); ?>
              
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><?=Yii::t('app', 'Close')?></button>
          </div>
        </div>
      </div><!-- modal-dialog -->
    </div><!-- modal -->
      <?php /*ActiveForm::end(); */
      ?>

             <div class="section-wrapper">
 <?php // $form = ActiveForm::begin(); 

 $query = new Query();
$dataProvider = new ActiveDataProvider([
    'query' => $query->from('registered_patient_account'),
    'pagination' => [
        'pageSize' => 20,
    ],
]);
echo GridView::widget([
  'id' => 'grid',
        'dataProvider' => $dataProvider,

  'columns'=>[
'Patient_Id',
'Patient_FName',
'Patient_LName',
'Patient_NId',
        'Unit_id' ,
         /*[
         'label'=>'Unit name',
            'class' => 'yii\grid\DataColumn',
             'attribute'=>'Unit_id',  
            'value' => function ($model) {
                $unit_name = Unit::findOne($model->Unit_id)->Unit_name;
                return $unit_name; 
            },
        ],*/

        ['class' => 'yii\grid\ActionColumn', 
            'template' => ' {send}',
            'buttons' => [
                'send' => function($model){
                 // Html::submitButton('Save', ['class' => 'btn btn-info'])
                     return Html::submitButton('transfer',[ 'class'=>'btn btn-info transfer', 'type'=>'button' , 'data-toggle'=>'modal','data-target'=>'#modaldemo3']);//Request_Id $req_id
                            },  
                     ],           
            ],
       /* [
     'label'=>'Unit Name',
        'attribute'=>'Unit_name',
        'value'=> function($model){
        $Unitt= Unitt::find()->where(['Unit_id'=>$model->Unit_id])->one();
        return $Unitt->Unit_name;      

        }
        ],
*/      
        
       ],
  
]);
?>
 <?php ActiveForm::end(); ?>
        
          </div>
          
          
      </div><!-- container -->
    </div><!-- slim-mainpanel -->

  
<script>
$(function() {
 
    
          $(".transfer").click(function(){
           
      var id = $(this).attr('id'); 
     $("#ir").val(id);
     $('#modaldemo3').modal('show');   
    });
  });
    </script>