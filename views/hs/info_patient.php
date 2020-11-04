<?php
use yii\helpers\Url;
use yii\base\Model;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use  yii\web\Session;
use yii\helpers\ArrayHelper;
use app\models\Unit;
use app\models\Symptoms;
use app\models\DiseaseDictionary;
use app\models\Hospital;
use app\models\Sensor;
use yii\web\Request;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use app\models\PatientMedicalHistory;
use app\models\PatientRequest;
use app\models\HospitalSession;
use app\models\PatientScreening;
use app\models\PatientSensorsData;
use app\models\RegisteredPatientAccount;
use app\models\Category;
use app\models\CovidCatagory;
use app\models\SymptomsGroup;
use app\models\HospitalScreening;

    $this->title = 'Patient info';
    $this->params['breadcrumbs'][] = ['label' => 'View Patient of Unit', 'url' => ['index','unit_id' => $model4->Unit_id]];

    $this->params['breadcrumbs'][] = $this->title;
?>


    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    </p>
<style type="text/css">
  .slim-mainpanel
  {
    background-color: #ffffff60;
    margin-top: 50px;   
    padding-bottom: 30px;
    border-radius: 10px;
  }
  .container
  {
    width: 100%;
    padding-bottom: 20px;
  }
  .nav-tabs > li > a {
    background-color: #8694947a;
    color: #200;
  }
  .tab-content
  {
    padding-bottom: 30px;
    background-color: #00e3ff45;
    color: #000;
    /*text-align: left;*/
  }
</style>
<div class="slim-mainpanel" >
      <div class="container">
        <!-- <div class="section-wrapper"> -->

          <div class="row">
            <div class="col-md mg-t-20 mg-md-t-0">
              <div class="card bd-0">
                <div class="card-header bg-dark">
                  <ul class="nav nav-tabs nav-tabs-for-dark card-header-tabs">
                    <li class="nav-item">
                      <a id="1"  class="nav-link bd-0 pd-y-8" href="#t1" data-toggle="tab"><?= Yii::t('app', 'Patient info & main result'); ?></a>
                    </li>
                 <li class="nav-item">
                      <a id="2"  class="nav-link bd-0  pd-y-8" href="#t2" data-toggle="tab"><?= Yii::t('app', 'Patient symptoms & medical history'); ?>
</a>
                    </li>
                  <li class="nav-item">
                      <a id="3"  class="nav-link bd-0  pd-y-8" href="#t3" data-toggle="tab"><?= Yii::t('app', 'Sensor data'); ?>
                 </a>
                    </li>            
                    <li class="nav-item">
                      <a id="4" class="nav-link bd-0  pd-y-8" href="#t4" data-toggle="tab"><?= Yii::t('app', 'Patient visual triage & estimated score'); ?> 
                 </a>
                    </li> 
                     <li class="nav-item">
                      <a id="5" class="nav-link bd-0  pd-y-8" href="#t5" data-toggle="tab"><?= Yii::t('app', 'Result , Advice & Decision'); ?>  
                 </a>
                    </li>       
                  </ul>
                </div><!-- card-header -->
                <div class="card-body bd bd-t-0">
                  <div class="tab-content">
                        <?php if (Yii::$app->session->hasFlash('success')): ?>
                  <div class="alert alert-success alert-dismissable">
                     <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                     <i class="icon fa fa-check"></i> <?= Yii::$app->session->getFlash('success') ?>
                  </div>
                  <?php endif; ?>
                  <?php if (Yii::$app->session->hasFlash('error')): ?>
                  <div class="alert alert-danger alert-dismissable">
                     <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                     <?= Yii::$app->session->getFlash('error') ?>
                  </div>
                  <?php endif; ?>
                    <div class="tab-pane" id="t1">
                       <div class="">
          <label class="section-title"><?= Yii::t('app', 'Patient information:'); ?></label>
                <br>
          <div class="form-layout">
                 <?php $form = ActiveForm::begin(['id' => 'users','class'=>'login100-form validate-form']); ?>  
            <div class="row mg-b-25">
              <div class="col-sm-4">
                <div class="form-group">
                  <label class="form-control-label"><?= Yii::t('app', 'Name'); ?></label>
              <div  class="wrap-input100 validate-input" >
                    <?= $form->field($model, 'Patient_LName')->textInput(['class' => 'form-control','value'=>$name,'readonly'=>'true'])->label(false) ?>           
					</div>
                </div>
              </div><!-- col-4 -->
                              <div class="col-sm-4">
                <div class="form-group">
                  <label class="form-control-label"><?= Yii::t('app', 'Patient ID'); ?></label>
              <div  class="wrap-input100 validate-input" >
                    <?= $form->field($model, 'Patient_Id')->textInput(['class' => 'form-control','readonly'=>'true'])->label(false) ?>           
					</div>
                </div>
              </div><!-- col-4 -->
                
                    <div class="col-sm-4">
                <div class="form-group">
                  <label class="form-control-label"><?= Yii::t('app', 'NID'); ?></label>
              <div  class="wrap-input100 validate-input" >
                <?= $form->field($model, 'Patient_NId')->textInput(['class' => 'form-control','readonly'=>'true'])->label(false) ?>           
					</div>
                </div>
              </div><!-- col-4 -->
                
                                  <div class="col-sm-4">
                <div class="form-group">
                  <label class="form-control-label"><?= Yii::t('app', 'File number'); ?></label>
              <div  class="wrap-input100 validate-input" >
                    <?= $form->field($model, 'Patient_Id')->textInput(['class' => 'form-control','readonly'=>'true'])->label(false) ?>           
					</div>
                </div>
              </div><!-- col-4 -->
                
                
                                  <div class="col-sm-4">
                <div class="form-group">
                  <label class="form-control-label"><?= Yii::t('app', 'Phone number'); ?></label>
              <div  class="wrap-input100 validate-input" >
                    <?= $form->field($model, 'Patient_MPhone')->textInput(['class' => 'form-control','readonly'=>'true'])->label(false) ?>           
					</div>
                </div>
              </div><!-- col-4 -->
                
                                        <div class="col-sm-4">
                <div class="form-group">
                  <label class="form-control-label"><?= Yii::t('app', 'Gender'); ?></label>
              <div  class="wrap-input100 validate-input" >
                    <?= $form->field($model, 'Patient_Gender')->textInput(['class' => 'form-control','readonly'=>'true'])->label(false) ?>           
					</div>
                </div>
              </div><!-- col-4 -->    
                
                 <div class="col-sm-4">
                <div class="form-group">
                  <label class="form-control-label"><?= Yii::t('app', 'Registration Date'); ?></label>
              <div  class="wrap-input100 validate-input" >
                    <?= $form->field($model, 'Registration_Date')->textInput(['class' => 'form-control','readonly'=>'true'])->label(false) ?>           
					</div>
                </div>
              </div><!-- col-4 -->
               
                           <div class="col-sm-4">
                <div class="form-group">
                  <label class="form-control-label"><?= Yii::t('app', 'Request Id'); ?></label>
              <div  class="wrap-input100 validate-input" >
                    <?= $form->field($req, 'Request_Id')->textInput(['class' => 'form-control','readonly'=>'true'])->label(false) ?>           
          </div>
                </div>
              </div><!-- col-4 -->
              
              <div class="col-sm-4">
                <div class="form-group">
                  <label class="form-control-label"><?= Yii::t('app', 'Request Status'); ?></label>
              <div  class="wrap-input100 validate-input" >
                    <?= $form->field($req, 'Request_Status')->textInput(['class' => 'form-control','readonly'=>'true'])->label(false) ?>           
          </div>
                </div>
             </div><!-- col-4 -->

                <div class="col-sm-4">
                <div class="form-group">
                  <label class="form-control-label"><?= Yii::t('app', 'Session ID'); ?></label>
              <div  class="wrap-input100 validate-input" >
                    <?= $form->field($model4, 'Session_ID')->textInput(['class' => 'form-control','readonly'=>'true'])->label(false) ?>           
          </div>
                </div>
              </div><!-- col-4 -->
              <div class="col-sm-4">
                <div class="form-group">
                  <label class="form-control-label"><?= Yii::t('app', 'Session Status'); ?></label>
              <div  class="wrap-input100 validate-input" >
                    <?= $form->field($model4, 'Session_status')->textInput(['class' => 'form-control','readonly'=>'true'])->label(false) ?>           
          </div>
                </div>
              </div><!-- col-4 -->

              
            </div><!-- row -->

              <?php ActiveForm::end(); ?>
          </div><!-- form-layout -->
        </div><!-- section-wrapper -->
                    </div><!-- tab-pane -->
                    <div class="tab-pane" id="t2">
                    <div class="card card-table">
                      <div class="section-wrapper">
                     <label class="section-title"><?= Yii::t('app', 'Patient symptoms :'); ?></label>      
                        <div class="row row-xs mg-t-10">
                          <div class="col-lg-1"></div> 
                       <div class="col-lg-10">
                      <div class="table-responsive">
                <?php

   $dataProvider = new ActiveDataProvider([
    //'SELECT Symp_ID, Symp_name, Score FROM symptoms' 
    'query' =>$symptomsData,  
  
]);
 echo GridView::widget([
  'id' => 'grid',
    'dataProvider' => $dataProvider,
 'columns'=>[
       [
     'label'=>'Symptoms ID',
            'class' => 'yii\grid\DataColumn',
             'attribute'=>'ID', 
            'value' => function ($data) {
                return $data->Symp_ID; 
            },
        ],
    
    [
        'label'=>'Group',
        'attribute'=>'Group_ID',
        'value'=> function($model){
        $SymptomsGroup= app\models\SymptomsGroup::find()->where(['Group_ID'=>$model->Symp_Group])->orderBy(['Group_ID'=>SORT_ASC])->one();
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
                       
            'value' => function ($data) use($req) {
      
     $modelr = PatientRequest::find()->FilterWhere(['=','Request_Id',$req->Request_Id]);
        $birthDate =app\models\Patient::findOne($modelr->one()->Patient_Id)->DateofBirth;
              
               //calulate patient age
                $birthDate = explode("-", $birthDate);
                $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[2], $birthDate[1], $birthDate[0]))) > date("md")
                ? ((date("Y") - $birthDate[0]) - 1)
                : (date("Y") - $birthDate[0]));
        if($age>=18){
          
                return $data->AdultScore; }
        else{
        return $data->pediatric_score;}
            },
        ],
  
     [
  'label'=>'Value',
    'attribute' => 'Value',
    'value' => function($data) use ($req_id){
        $val = PatientScreening::find()->where('Request_Id = :ri',[':ri'=>$req_id])->andWhere('Symp_ID = :si',[':si'=>$data->Symp_ID])->one()->Value;
        if($val == "Y")
        return Html::checkbox('sym_value'.$data->Symp_ID,true);
        else
        return Html::checkbox('sym_value'.$data->Symp_ID,false);
    },
    'format' => 'raw'
],
   [
  'label'=>'Checked By',
    'attribute' => 'ByDone',
    'value' => function($data) use ($req_id){
        $val = PatientScreening::find()->where('Request_Id = :ri',[':ri'=>$req_id])->andWhere('Symp_ID = :si',[':si'=>$data->Symp_ID])->one()->ByDone;
              
        return $val;        
    },
    'format' => 'raw'
],
  ],
  
]);
?>
        
        <h4 class="slim-card-title">Medical history:</h4>
              <?php
   $dataProvider = new ActiveDataProvider([
    
    'query' =>$mh,

    
  
]);
 echo GridView::widget([
  'id' => 'grid',
    'dataProvider' => $dataProvider,
  
  'columns'=>[
       [
     'label'=>'Disease name',
            'class' => 'yii\grid\DataColumn',
            'attribute'=>'Diseas_Name', 
            'value' => function ($mh) {
        $diss=app\models\DiseaseDictionary::find()->where(['Disease_Id'=>$mh->Disease_Id])->one();
                return $diss->Disease_Name; 
            },
        ],
    
    [
        'label'=>'Disease status',
        //'attribute'=>'Disease_Status',
        'value'=> function($data){
       
        return $data->Disease_Status;
        }
      ],
    [
     'label'=>'Disease Since',
            'class' => 'yii\grid\DataColumn',
             //'attribute'=>'Disease_Since',      
            'value' => function ($data) {
       
                return $data->Disease_Since; 
            },
        ],
     [
        'label'=>'Hospital Name',
        //'attribute'=>'ScoringType',
        'value'=> function($mh){
        $hos= app\models\Hospital::find()->where(['Hosp_id'=>$mh->Hosp_id])->one();
        return $hos->Hosp_name;
        }
      ],
    
  
  ],
  
]);
?><!-- table-responsive -->
                       </div>
                     </div>
                  </div>
                </div>
              </div>
</div>
                    <div class="tab-pane" id="t3">
                        
                       <div class="form-layout">
                 <?php $form = ActiveForm::begin(['id' => 'users','class'=>'login100-form validate-form']); ?>  
            <div class="row mg-b-25">
              <div class="col-sm-4">
                <div class="form-group">
                  <label class="form-control-label"><?= Yii::t('app', 'Name'); ?></label>
              <div  class="wrap-input100 validate-input" >
                   <?= $form->field($model, 'Patient_LName')->textInput(['class' => 'form-control','value'=>$name,'readonly'=>'true'])->label(false) ?>         
					</div>
                </div>
              </div><!-- col-4 -->
                              <div class="col-sm-4">
                <div class="form-group">
                  <label class="form-control-label"><?= Yii::t('app', 'Date'); ?></label>
              <div  class="wrap-input100 validate-input" >
                    <?= $form->field($model, 'Patient_Id')->textInput(['class' => 'form-control','readonly'=>'true','value'=>$date])->label(false) ?>           
					</div>
                </div>
              </div><!-- col-4 -->
                
                    <div class="col-sm-4">
                <div class="form-group">
                  <label class="form-control-label"><?= Yii::t('app', 'Time'); ?></label>
              <div  class="wrap-input100 validate-input" >
                    <?= $form->field($model, 'Patient_NId')->textInput(['class' => 'form-control','readonly'=>'true','value'=>$time])->label(false) ?>           
					</div>
                </div>
              </div><!-- col-4 -->
                
                
                                        <div class="col-sm-4">
                <div class="form-group">
                  <label class="form-control-label"><?= Yii::t('app', 'Gender'); ?></label>
              <div  class="wrap-input100 validate-input" >
                    <?= $form->field($model, 'Patient_Gender')->textInput(['class' => 'form-control','readonly'=>'true'])->label(false) ?>           
					</div>
                </div>
              </div><!-- col-4 --> 
                
                                        <div class="col-sm-4">
                <div class="form-group">
                  <label class="form-control-label"><?= Yii::t('app', 'Address'); ?></label>
              <div  class="wrap-input100 validate-input" >
                    <?= $form->field($model, 'Patient_Address')->textInput(['class' => 'form-control','readonly'=>'true'])->label(false) ?>           
					</div>
                </div>
              </div><!-- col-4 -->
                
                
                                  <div class="col-sm-4">
                <div class="form-group">
                  <label class="form-control-label"><?= Yii::t('app', 'Date of brith'); ?></label>
              <div  class="wrap-input100 validate-input" >
                    <?= $form->field($model, 'DateofBirth')->textInput(['class' => 'form-control','readonly'=>'true'])->label(false) ?>           
					</div>
                </div>
              </div><!-- col-4 -->
              
            </div><!-- row -->
      
            <h2><strong>Sensors' Readings</strong></h2>
             <br>
             <div class="card card-dash-one mg-t-20">
          <div class="row no-gutters">
           <div class="col-lg-1"></div> 
         <div class="col-lg-10">

<?php
   $dataProvider = new ActiveDataProvider([
    
    'query' =>$sensors2,    
  
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
    /*[
  'label'=>'Value',
    'attribute' => 'Value',
    'value' => function($data){
         $Sensor= app\models\Sensor::find()->where(['SensorID'=>$data->SensorID])->one();
        return Html::textInput('sensor_value'.$data->SensorID,$data->Value,['type' => 'number','lang'=>'en-EN','step'=>'.01','min'=>$Sensor->Min_Value,'max'=>$Sensor->Max_Value]);
    },
    'format' => 'raw'
],*/
    [
     'label'=>'Value',
            'class' => 'yii\grid\DataColumn',
             'attribute'=>'Value',      
            'value' => function ($data) {
                return $data->Value; 
            },
        ],
  ],
  
]);
?>
            </div> 
           <div class="col-lg-1"></div> 
          </div><!-- row -->          
         </div><!-- card -->

 <br>
  <br>
              <h2><strong> Monitor Sensors' Readings</strong></h2>
                  <div class="card card-dash-one mg-t-20">
                  <div class="row no-gutters">
                    <div class="col-lg-1"></div> 
                      <div class="col-lg-10">
<?php
   $dataProvider = new ActiveDataProvider([
    
    'query' =>$sensorData,    
  
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
 
  ],
  
]);
?>
            </div> 
           <div class="col-lg-1"></div> 
         </div>
       </div>
       <br>
        <?= Html::submitButton('Update Monitor Sensor', ['class' => 'btn btn-primary',
                         'name' => 'update_monitor'] ) ?>
              <?php ActiveForm::end(); ?>
          </div><!-- form-layout -->    
                   
                        
                    </div><!-- tab-pane -->
                 <div class="tab-pane" id="t4">
                   <div class="card card-table">
                     <?php $form = ActiveForm::begin(['id' => 'users','class'=>'login100-form validate-form']); ?>
                      <div class="section-wrapper">
                     <label class="section-title"><?= Yii::t('app', 'Patient visual triage:'); ?></label>      
                        <div class="row row-xs mg-t-10">
                       <div class="col-lg-8">
                      <div class="table-responsive">
                <?php

   $dataProvider = new ActiveDataProvider([
    //'SELECT Symp_ID, Symp_name, Score FROM symptoms' 
    'query' =>$symptomsData,  
  
]);
 echo GridView::widget([
  'id' => 'grid',
    'dataProvider' => $dataProvider,
 'columns'=>[
       [
     'label'=>'Symptoms ID',
            'class' => 'yii\grid\DataColumn',
             'attribute'=>'ID', 
            'value' => function ($data) {
                return $data->Symp_ID; 
            },
        ],
    
    [
        'label'=>'Group',
        'attribute'=>'Group_ID',
        'value'=> function($model){
        $SymptomsGroup= app\models\SymptomsGroup::find()->where(['Group_ID'=>$model->Symp_Group])->orderBy(['Group_ID'=>SORT_ASC])->one();
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
                       
            'value' => function ($data) use($req) {
      
     $modelr = PatientRequest::find()->FilterWhere(['=','Request_Id',$req->Request_Id]);
        $birthDate =app\models\Patient::findOne($modelr->one()->Patient_Id)->DateofBirth;
              
               //calulate patient age
                $birthDate = explode("-", $birthDate);
                $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[2], $birthDate[1], $birthDate[0]))) > date("md")
                ? ((date("Y") - $birthDate[0]) - 1)
                : (date("Y") - $birthDate[0]));
        if($age>=18){
          
                return $data->AdultScore; }
        else{
        return $data->pediatric_score;}
            },
        ],
     [
  'label'=>'Value',
    'attribute' => 'Value',
    'value' => function($data) use ($req_id){
        $HSs = HospitalSession::find()->where('Request_Id = :ti', [':ti' =>$req_id])->one();
        $val = HospitalScreening::find()->where('Session_ID = :se',[':se'=>$HSs->Session_ID])->andWhere('Symp_ID = :si',[':si'=>$data->Symp_ID])->one()->value;
        if($val == "Y")
        return Html::checkbox('sym_value'.$data->Symp_ID,true);
        else
        return Html::checkbox('sym_value'.$data->Symp_ID,false);
    },
    'format' => 'raw'
],
    [
  'label'=>'Checked By',
    'attribute' => 'ByDone',
    'value' => function($data) use ($req_id){
      $HSs = HospitalSession::find()->where('Request_Id = :ti', [':ti' =>$req_id])->one();
        $val = HospitalScreening::find()->where('Session_ID = :se',[':se'=>$HSs->Session_ID])->andWhere('Symp_ID = :si',[':si'=>$data->Symp_ID])->one()->ByDone;
              
        return $val;        
    },
    'format' => 'raw'
],
  ],
  
]);
?>
              </div><!-- table-responsive -->

              </div>
<!--                        </div>
 -->                      <div class="col-sm-4">
                        <div class="form-group">
                  <label class="form-control-label"><?= Yii::t('app', 'Estimated score'); ?></label>
              <div  class="wrap-input100 validate-input" >
                    <?= $form->field($model, 'Patient_Id')->textInput(['class' => 'form-control','readonly'=>'true','value'=>$es])->label(false) ?>           
					</div>
                </div>  
                          
                          
                       </div> 
                                                         <div class="col-lg-4">
                      <div class="form-group">
                  <label class="form-control-label"><?= Yii::t('app', 'Estimated Level'); ?></label>
              <div  class="wrap-input100 validate-input" >
                     <?= $form->field($model,'Estimated_Level')->textInput(['class' =>'form-control','readonly'=>'true','value'=>$cn,'name'=>'level'])->label(false)//'id'=>"select_cat",'prompt'=>'no category found'])?>            
          </div>
                </div>
              </div><!-- col-4 -->
        <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label"><?= Yii::t('app', 'Estimated COVID'); ?></label>
              <div  class="wrap-input100 validate-input" >
                     <?= $form->field($model,'Estimated_COVID')->textInput(['class' =>'form-control','readonly'=>'true','value'=>$cc,'name'=>'covid'])->label(false)//'id'=>"select_cat"])?> 
                          
          </div>
                </div>
              </div> 
                       
                     </div>
                     
                        
                        <?= Html::submitButton('Get Updates From Sensors', ['class' => 'btn btn-info',
                         'name' => 'get_update'] ) ?>

                                  &nbsp;&nbsp;&nbsp;&nbsp;

                        <?= Html::submitButton('Update', ['class' => 'btn btn-primary',
                         'name' => 'update'] ) ?>
                           </div>
                           <?php ActiveForm::end(); ?> 
                           </div>
          

                    </div><!-- tab-pane -->
                     <div class="tab-pane" id="t5">
                     <?php $form = ActiveForm::begin(['id' => 'users','class'=>'login100-form validate-form']); ?>      
                    <div class="row row-xs mg-t-10">
                           
                       <div class="col-sm-4">
                       <div class="card card-table">
                          <div class="card-header">
                          <h6 class="slim-card-title">Result:</h6>
                         </div><!-- card-header -->
           <div class="section-wrapper">
              <div class="form-layout form-layout-4">
                                                
            
                <div class="row">
                  <label style="" class="col-sm-4 form-control-label"><?= Yii::t('app', 'Category:'); ?></label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <?= $form->field($model4, 'Cat_ID')->textInput(['class' => 'form-control','readonly'=>'true','value'=>$category,'name'=>'cat'])->label(false) ?>  
                  </div>
                </div><!-- row -->
                <div class="row">
                  <label style="" class="col-sm-4 form-control-label"><?= Yii::t('app', 'Current status:'); ?></label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                   <?php 
                    if($model4->Session_status == 'Closed'){
                        ?>      
                  <?=Html::activeDropDownList($model4,'patient_status',
                ArrayHelper::map(Unit::find()->all(), 'Unit_id','Unit_name'),['class' =>'form-control','id'=>"select_status",'disabled'=>'true'])?>
                    <?php
                    }else {?>
                     <?=Html::activeDropDownList($model4,'patient_status',
                     ArrayHelper::map(Unit::find()->all(), 'Unit_id','Unit_name'),['class' =>'form-control','id'=>"select_status"])?>   
                      
                      <?php
                          }?>
                  </div>
                </div><!-- row -->
                  <br>
                  
                           <div class="row">
                  <label style="" class="col-sm-4 form-control-label"><?= Yii::t('app', 'Unit:'); ?></label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                       <?php 
                    if($model4->Session_status == 'Closed'){
                        ?>      
                <?=Html::activeDropDownList($model4,'Unit_id',
                ArrayHelper::map(Unit::find()->all(), 'Unit_id','Unit_name'),['class' =>'form-control','disabled'=>'true','name'=>'unit'])?>
                    <?php
                    }else {?>
               <?=Html::activeDropDownList($model4,'Unit_id',
                ArrayHelper::map(Unit::find()->all(), 'Unit_id','Unit_name'),['class' =>'form-control','id'=>"select_unit",'name'=>'unit'])?>
                      
                      <?php
                          }?>
                  </div>
                </div><!-- row -->  
                  <br>
                
                       <div class="row">
                  <label style="" class="col-sm-4 form-control-label"><?= Yii::t('app', 'Session status'); ?></label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <?= $form->field($model4, 'Session_status')->textInput(['class' => 'form-control','readonly'=>'true'])->label(false) ?>  
                  </div>
                </div><!-- row -->
 
                  <br>
                  <div id="reason_div" hidden class="row">
                  <label style="" class="col-sm-4 form-control-label"><?= Yii::t('app', 'Reason'); ?></label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <?= $form->field($model4, 'reason')->textInput(['class' => 'form-control','value'=>''])->label(false) ?>  
                  </div>
                </div><!-- row -->

              </div><!-- form-layout -->
            </div><!-- section-wrapper -->
                           
                           </div> 
                        </div>
                             <div class="col-sm-7">
                       <div class="card card-table">
                          <div class="card-header">
                          <h6 class="slim-card-title">Advice:</h6>
                         </div><!-- card-header -->
                                             
                  <div class="form-group row">
                        <div class="col-md-12">
                            <?php
                             $category=new Category();
                              $Advice=$model4->advices;
                              if($Advice !=null && $Advice !='')
                              {
                              echo $form->field($model4, 'advices')->textArea(['rows' => '9','name'=>'adv'])->label(false);
                              }
                              else
                              {
                              echo $form->field($model4, 'advices')->textArea(['rows' => '9','value'=>$category->Advice1(),'name'=>'adv'])->label(false);
                              }                            
                            
                             ?>
                        </div>
                     </div>

                           </div> 
                        </div> 
                       
                         </div>
                 <?php 
                    if(/*$model4->Session_status != 'Closed'*/1!=1){
                      } else {
                        ?>
                     <div >
                    <div class="form-layout form-layout-4">
                     <div class="form-layout-footer mg-t-30">
                      <?php //'In progress','Closed','Pending','In service','Rejected','Transferred'
                      if($model4->Session_status=='Pending')
                          { ?>                          
                              <button name="submit" value="Admit" type="submit" class="btn btn-primary " ><?= Yii::t('app', 'Admit'); ?></button>
                              &nbsp;&nbsp;

                          
                        <?php  }else{ ?>

                                <button name="submit" value="Admit" type="submit" class="btn btn-primary " disabled="true"><?= Yii::t('app', 'Admit'); ?></button>
                              &nbsp;&nbsp;
                         
                         <?php  }                               
                          
                         if($model4->Session_status=='Transferred' || $model4->Session_status=='Closed' )
                          { ?>                          
                               <button name="submit" value="Trasfer" type="submit" class="btn btn-primary " disabled="true"><?= Yii::t('app', 'Trasfer'); ?></button>
                              &nbsp;&nbsp;

                          
                        <?php  }else{ ?>

                                 <button name="submit" value="Trasfer" type="submit" class="btn btn-primary "><?= Yii::t('app', 'Trasfer'); ?></button>
                              &nbsp;&nbsp;
                         
                        <?php  }                               
                          
                         if($model4->Session_status=='Rejected' || $model4->Session_status=='Closed')
                          { ?>                          
                              <button name="submit" value="Reject" type="submit" class="btn btn-danger " disabled="true"><?= Yii::t('app', 'Reject'); ?></button>
                              &nbsp;&nbsp;&nbsp;

                          
                        <?php  }else{ ?>

                                <button name="submit" value="Reject" type="submit" class="btn btn-danger "><?= Yii::t('app', 'Reject'); ?></button>
                                  &nbsp;&nbsp;&nbsp;
                         
                         <?php  }                               
                          
                         if($model4->Session_status=='In service' ||$model4->Session_status=='Pending')
                          { ?>                          
                               <button name="submit" value="save" type="submit" class="btn btn-success "><?= Yii::t('app', 'Save'); ?></button>
                                   &nbsp;&nbsp; 

                               <button  name="submit" value="check" type="submit"  class="btn btn-success "><?= Yii::t('app', 'Checkout'); ?></button>

                          
                        <?php  }else{ ?>

                                 <button name="submit" value="save" type="submit" class="btn btn-success " disabled="true"><?= Yii::t('app', 'Save'); ?></button>
                                     &nbsp;&nbsp; 

                                 <button  name="submit" value="check" type="submit"  class="btn btn-success " disabled="true"><?= Yii::t('app', 'Checkout'); ?></button>
                         
                         <?php  } ?>
                                          
                
          
                  </div>
                         </div>
                         </div>
                        <?php /*} else {*/
                          ?>
                       <br> <br>
                    
                    <?php }?> 
                         <?php ActiveForm::end(); ?> 
                    </div><!-- tab-pane -->  
                      
                      
                      
                  </div><!-- tab-content -->
                </div><!-- card-body -->
              </div><!-- card -->
            </div><!-- col -->
            
          </div><!-- row -->
          <div>
          <center>
           
            </center>  
          </div>
        </div><!-- section-wrapper -->
     </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
$(document).ready(function(){
    //localStorage.clear();
       
   var tab_id = localStorage.getItem('tab_id');
   var content_id = localStorage.getItem('content_id');

    if(tab_id ==null){
    $('.nav-item').find("#1").addClass('active');    
    $('.tab-content').find("#t1").addClass('active'); 
   }
     else{   
     $('.nav-item').find('.active').removeClass('active');
     $('.tab-content').find('.active').removeClass('active');
     $('.nav-item').find("#"+tab_id).addClass('active');    
     $('.tab-content').find("#"+content_id).addClass('active');    
    }

   
    $('.bd-0').click(function() {
      var tab_id = $(this).attr('id')[0];
      var content_id = "";    
      if(tab_id == "1")
          content_id ="t1";
        else if(tab_id == "2")
         content_id ="t2"; 
         else if(tab_id == "3")
         content_id ="t3"; 
         else if(tab_id == "4")
         content_id ="t4"; 
         else 
         content_id ="t5"; 
 
        
     localStorage.setItem('tab_id',tab_id);     
     localStorage.setItem('content_id',content_id);         
        
    });
    
    //select
    $("#select_status").find('option').remove();
     var options = '';  
     var st1 = "stable";
     var st2 = "unstable";
     options += '<option value="' + st1 + '">'+ st1 + '</option>';
     options += '<option value="' + st2 + '">'+ st2 + '</option>';
     $("#select_status").append(options);
     $("#select_status").val('<?php echo $model4->patient_status ?>');
    

   //chenge status and unit
   $status_val= $("#select_status").val();
   $unit_val= $("#select_unit").val();
   $("#select_status").change(function(){ 
       if($status_val == $("#select_status").val() && $unit_val == $("#select_unit").val())
        $("#reason_div").prop('hidden',true);   
         else
       $("#reason_div").prop('hidden',false);
            });
    
       $("#select_unit").change(function(){ 
       if($status_val == $("#select_status").val() && $unit_val == $("#select_unit").val())
        $("#reason_div").prop('hidden',true);   
         else
       $("#reason_div").prop('hidden',false);
            });  

    
});  
    
</script>
