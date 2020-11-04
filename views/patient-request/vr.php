<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use app\models\PatientMedicalHistory;
use app\models\PatientRequest;
use app\models\HospitalSession;
use app\models\PatientScreening;
use app\models\DiseaseDictionary;
use app\models\PatientSensorsData;
use app\models\RegisteredPatientAccount;
use app\models\Category;
use app\models\CovidCatagory;
use app\models\Symptoms;
use app\models\SymptomsGroup;
use app\models\Unit;
use yii\Controllers\PatientMedicalHistoryController;
use yii\web\Request;
use yii\Controllers\PatientRequestController;
use yii\Controllers\EmployeeController;
use yii\Controllers\HospitalSessionController;
use yii\bootstrap\ActiveForm;
use yii\web\Session;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\base\Model;
use app\models\Hospital;
use app\models\Sensor;
$this->title = 'Patient information';
$this->params['breadcrumbs'][]=['label' => 'Patient Current Request', 'url' => ['index']];
$this->params['breadcrumbs'][] =$this->title;
    ?>

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
<div class="slim-mainpanel">
      <div class="container">
        <div class="section-wrapper mg-t-20">

          <div class="row">
            <div class="col-md mg-t-20 mg-md-t-0">
              <div class="card bd-0">
                <div class="card-header bg-dark">
                  <ul class="nav nav-tabs nav-tabs-for-dark card-header-tabs">
                    <li class="nav-item" class="active">
                      <a id="1"  class="nav-link bd-0 pd-y-8" href="#t1"  data-toggle="tab"><?= Yii::t('app', 'Patient info & main result'); ?></a>
                    </li>
                 <li class="nav-item">
                      <a id="2"  class="nav-link bd-0  pd-y-8" href="#t2" data-toggle="tab"><?= Yii::t('app', 'Medical History'); ?>
</a>
                    </li>
                  <li class="nav-item">
                      <a id="3"  class="nav-link bd-0  pd-y-8" href="#t3" data-toggle="tab"><?= Yii::t('app', 'Sensor data'); ?>
                 </a>
                    </li>            
                    <li class="nav-item">
                      <a id="4" class="nav-link bd-0  pd-y-8" href="#t4" data-toggle="tab"><?= Yii::t('app', 'Patient virtual triage & estimated score'); ?> 
                 </a>
                    </li> 
                     <li class="nav-item">
                      <a id="5" class="nav-link bd-0  pd-y-8" href="#t5" data-toggle="tab"><?= Yii::t('app', 'Result , Advice & Decision'); ?>  
                 </a>
                    </li>       
                  </ul>
                </div><!-- card-header -->
                <div class="card-body bd bd-t-0" >
                  <div class="tab-content" >
                       
				  
                    <div class="tab-pane fade in active" id="t1" >
                       <div class="">
          <label class="section-title"><?= Yii::t('app', 'Patient information:'); ?></label>
                
          <div class="form-layout">
                 <?php $form = ActiveForm::begin(['id' => 'users','class'=>'login100-form validate-form']); ?>  
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label"><?= Yii::t('app', 'Name'); ?></label>
              <div  class="wrap-input100 validate-input" >
                    <?= $form->field($model, 'Patient_FName')->textInput(['class' => 'form-control','readonly'=>'true'])->label(false) ?>           
					</div>
                </div>
              </div><!-- col-4 -->
                              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label"><?= Yii::t('app', 'Patient ID'); ?></label>
              <div  class="wrap-input100 validate-input" >
                    <?= $form->field($model, 'Patient_Id')->textInput(['class' => 'form-control','readonly'=>'true'])->label(false) ?>           
					</div>
                </div>
              </div><!-- col-4 -->
                
                    <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label"><?= Yii::t('app', 'NID'); ?></label>
              <div  class="wrap-input100 validate-input" >
                <?= $form->field($model, 'Patient_NId')->textInput(['class' => 'form-control','readonly'=>'true'])->label(false) ?>           
					</div>
                </div>
              </div><!-- col-4 -->
                
                                  <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label"><?= Yii::t('app', 'File number'); ?></label>
              <div  class="wrap-input100 validate-input" >
                    <?= $form->field($model, 'Patient_Id')->textInput(['class' => 'form-control','readonly'=>'true'])->label(false) ?>           
					</div>
                </div>
              </div><!-- col-4 -->
                
                
                                  <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label"><?= Yii::t('app', 'Phone number'); ?></label>
              <div  class="wrap-input100 validate-input" >
                    <?= $form->field($model, 'Patient_MPhone')->textInput(['class' => 'form-control','readonly'=>'true'])->label(false) ?>           
					</div>
                </div>
              </div><!-- col-4 -->
                
                                        <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label"><?= Yii::t('app', 'Gender'); ?></label>
              <div  class="wrap-input100 validate-input" >
                    <?= $form->field($model, 'Patient_Gender')->textInput(['class' => 'form-control','readonly'=>'true'])->label(false) ?>           
					</div>
                </div>
              </div><!-- col-4 -->    
                
                 <div class="col-lg-4">
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
			<br>
			
			  </br>
			  
                
				
                <!-- col-4 -->
			  
			  

              
            </div><!-- row -->

              <?php ActiveForm::end(); ?>
          </div><!-- form-layout -->
        </div><!-- section-wrapper -->
                    </div><!-- tab-pane -->
                    <div class="tab-pane" id="t2">
                    <div class="card card-table">
                      <div class="section-wrapper">
                     <label class="section-title"><?= Yii::t('app', 'Medical history:'); ?></label>      
                        <div class="row row-xs mg-t-10">
                          <div class="col-lg-1"></div>
                       <div class="col-lg-10">
                      <div class="table-responsive">
					   <?php
	/* $dataProvider = new ActiveDataProvider([
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
        $val = PatientScreening::find()->where('Request_Id = :ri',[':ri'=>$req_id])->andWhere('Symp_ID = :si',[':si'=>$data->Symp_ID])->one();
        if($val == "Y")
        return Html::checkbox('sym_value'.$data->Symp_ID,true);
        else
        return Html::checkbox('sym_value'.$data->Symp_ID,false);
    },
    'format' => 'raw'
],
	
	],
	
]);*/
?>
				
				<h4 class="slim-card-title"><!-- Medical history: --></h4>
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
                       </div></div>
                          </div></div></div>
                    </div><!-- tab-pane -->
              <div class="tab-pane" id="t3">
                        
                       <div class="form-layout">
                 <?php $form = ActiveForm::begin(['id' => 'users','class'=>'login100-form validate-form']); ?>  
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label"><?= Yii::t('app', 'Name'); ?></label>
              <div  class="wrap-input100 validate-input" >
                   <?= $form->field($model, 'Patient_FName')->textInput(['class' => 'form-control','readonly'=>'true'])->label(false) ?>         
					</div>
                </div>
              </div><!-- col-4 -->
                              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label"><?= Yii::t('app', 'Date'); ?></label>
              <div  class="wrap-input100 validate-input" >
                    <?= $form->field($model, 'Patient_Id')->textInput(['class' => 'form-control','readonly'=>'true','value'=>$date])->label(false) ?>           
					</div>
                </div>
              </div><!-- col-4 -->
                
                    <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label"><?= Yii::t('app', 'Time'); ?></label>
              <div  class="wrap-input100 validate-input" >
                    <?= $form->field($model, 'Patient_NId')->textInput(['class' => 'form-control','readonly'=>'true','value'=>$time])->label(false) ?>           
					</div>
                </div>
              </div><!-- col-4 -->
                
                
                                        <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label"><?= Yii::t('app', 'Gender'); ?></label>
              <div  class="wrap-input100 validate-input" >
                    <?= $form->field($model, 'Patient_Gender')->textInput(['class' => 'form-control','readonly'=>'true'])->label(false) ?>           
					</div>
                </div>
              </div><!-- col-4 --> 
                
                                        <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label"><?= Yii::t('app', 'Address'); ?></label>
              <div  class="wrap-input100 validate-input" >
                    <?= $form->field($model, 'Patient_Address')->textInput(['class' => 'form-control','readonly'=>'true'])->label(false) ?>           
					</div>
                </div>
              </div><!-- col-4 -->
                
                
                                  <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label"><?= Yii::t('app', 'Date of brith'); ?></label>
              <div  class="wrap-input100 validate-input" >
                    <?= $form->field($model, 'DateofBirth')->textInput(['class' => 'form-control','readonly'=>'true'])->label(false) ?>           
					</div>
                </div>
              </div><!-- col-4 -->
              
            </div><!-- row -->
              <?php ActiveForm::end(); ?>
          </div><!-- form-layout -->    
                    <div class="card card-dash-one mg-t-20">
          <div class="row no-gutters">
            <?php
              foreach($sensors as $m){
                  $sensor_name = Sensor::findOne($m->SensorID)->SensorName;
                  ?>
                          <div class="col-lg-6">
               
              <div class="dash-content">
			  
			 <table>
			 
			 <tr>
			 <td>
			 <i class="iconify" data-icon="ion-ios-analytics-outline" data-inline="false" width="100px" height="150px" color="lightgray"  ></i></td>
			
			 <td><label class="tx-primary"><?= $sensor_name ?></label><h2><?= $m->Value?></h2></td></tr>
							  
							  </table>
              </div><!-- dash-content -->
            </div><!-- col-3 -->
              <?php
              }?>

 
          </div><!-- row -->          
        </div><!-- card -->

                        
                    </div><!-- tab-pane -->
                 <div class="tab-pane" id="t4">
				 <?php $form = ActiveForm::begin(['id' => 'users','class'=>'login100-form validate-form']); ?>
                   <div class="card card-table">
                      <div class="section-wrapper">
                     <label class="section-title"><?= Yii::t('app', 'Patient virtual triage:'); ?></label>      
                        <div class="row row-xs mg-t-10">
                       <div class="col-lg-8">
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
?><!-- table-responsive -->
                       </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                  <label class="form-control-label"><?= Yii::t('app', 'Estimated score'); ?></label>
              <div  class="wrap-input100 validate-input" >
                    <?= $form->field($req, 'Estimated_score')->textInput(['class' => 'form-control','readonly'=>'true','name'=>'score'])->label(false) ?>           
					</div>
                </div>  
                          
                       </div>
					   <div class="col-lg-4">
                      <div class="form-group">
                  <label class="form-control-label"><?= Yii::t('app', 'Estimated Level'); ?></label>
              <div  class="wrap-input100 validate-input" >
                     <?= $form->field($req,'Estimated_Level')->textInput(['class' =>'form-control','readonly'=>'true','value'=>$cn,'name'=>'level'])->label(false)//'id'=>"select_cat",'prompt'=>'no category found'])?>            
					</div>
                </div>
              </div><!-- col-4 -->
			  <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label"><?= Yii::t('app', 'Estimated COVID'); ?></label>
              <div  class="wrap-input100 validate-input" >
                     <?= $form->field($req,'Estimated_COVID')->textInput(['class' =>'form-control','readonly'=>'true','value'=>$cc,'name'=>'covid'])->label(false)//'id'=>"select_cat"])?> 
                   				
					</div>
                </div>
              </div>
			          <div class="col-lg-4">
                      <div class="form-group">
                  <label class="form-control-label"><?= Yii::t('app', 'Notes'); ?></label>
                    <div class="wrap-input100 validate-input">
                    <?= $form->field($model4, 'Notes')->textInput(['class' => 'form-control','value'=>'','name'=>'nr'])->label(false) ?>  
                  </div>
                </div>
				
				
                  
                      <div class="form-group">
                  <label class="form-control-label"><?= Yii::t('app', 'Advice'); ?></label>
                  <div class="wrap-input100 validate-input">
                    <?php
                             $category=new Category();
                              $Advice=$model4->advaices;
                              if($Advice !='default')
                              {
                              echo $form->field($model4, 'advaices')->textArea(['rows' => '5','name'=>'advice4'])->label(false);
                              }
                              else
                              {
                              echo $form->field($model4, 'advaices')->textArea(['rows' => '5','name'=>'advice4','value'=>$category->Advice2()])->label(false);
                              }                            
                            
                             ?>
                    <?php 
                   //$form->field($model4, 'Notes')->textArea(['rows' => '5','class' => 'form-control','value'=>'','name'=>'ar'])->label(false) 
                    ?>  
					 
                  </div>
                </div>
								
                       
                     </div>
			  			
                       
                     </div>
                           </div>
                           </div>

                              <?= Html::submitButton('Get Updates From Sensors', ['class' => 'btn btn-info',
                                     'name' => 'get_update'] ) ?>

                                  &nbsp;&nbsp;&nbsp;&nbsp;
                					   <?= Html::submitButton('Update', ['class' => 'btn btn-primary',
                            'name' => 'save'] ) ?>
                                          &nbsp;&nbsp;&nbsp;&nbsp;
                            


          <?php $form = ActiveForm::end(); ?>
                    </div><!-- tab-pane -->
                     <div class="tab-pane" id="t5">
                     <?php $form = ActiveForm::begin(['id' => 'users','class'=>'login100-form validate-form']); ?>      
                    <div class="row row-xs mg-t-10">
                           
                       <div class="col-lg-6">
                       <div class="card card-table">
                          <div class="card-header">
                          <h4 class="slim-card-title">Result:</h4>
                         </div><!-- card-header -->
           <div class="section-wrapper">
              <div class="form-layout form-layout-4">
                                                
            
                <div class="row">
                  <label style="" class="col-sm-4 form-control-label"><?= Yii::t('app', 'Category:'); ?></label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <?=$form->field($req,'Estimated_Level')->textInput(['class' =>'form-control','readonly'=>'true','value'=>$cn,'name'=>'cat'])->label(false)?>  
                  </div>
                </div><!-- row -->
			
               
                  
                 
                           <div class="row">
                  <label style="" class="col-sm-4 form-control-label"><?= Yii::t('app', 'Unit:'); ?></label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                   
                    <?php 
                    /*if($model4->Session_status == 'Closed'){
                            
                echo Html::activeDropDownList($model4,'Unit_id',
                ArrayHelper::map(Unit::find()->all(), 'Unit_id','Unit_name'),['class' =>'form-control','disabled'=>'true'])
                   
                    }else {
               echo Html::activeDropDownList($model4,'Unit_id',
                ArrayHelper::map(Unit::find()->all(), 'Unit_id','Unit_name'),['class' =>'form-control','id'=>"select_unit"])
                      
                      
                          }*/
                      echo $form->field($model, 'Unit_id')->dropdownList(Unit::find()
                            ->select(['Unit_name'])
                            ->indexBy('Unit_id')
                           ->column(),
                        ['readonly'=>'true','disabled'=>'true'/*,'prompt'=>3*/]
                      )->label(false);
                          ?>
              <?php // $form->field($req, 'Estimated_Level')->dropDownList(ArrayHelper::map(hospital::find()->all(), 'Hosp_id', 'Hosp_name')),['prompt'=>'Select SymptomsGroup'] ?>

                       <?php
                      /* $form->field($req,'Estimated_Level')->textInput(['class' =>'form-control','readonly'=>'true','readonly'=>'true','value'=>'Flu','name'=>'unit'])->label(false)*/
                       ?>  
                      
                  </div>
                </div><!-- row --> 
				
             <div id="reason_div" class="row">
                  <label class="col-sm-4 form-control-label"><?= Yii::t('app', 'Estimated COVID'); ?></label>
              <div  class="col-sm-8 mg-t-10 mg-sm-t-0" >
                     <?= $form->field($req,'Estimated_COVID')->textInput(['class' =>'form-control','readonly'=>'true','value'=>$cc,'name'=>'covid'])->label(false)//'id'=>"select_cat"])?> 
                          
                 </div>
               </div>

		        		<div id="reason_div" class="row">
                  <label style="" class="col-sm-4 form-control-label"><?= Yii::t('app', 'Reason'); ?></label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">

                    <?php
                             $category=new Category();
                             if($model3!=null)//advices
                             {
                                  /*$reason=$model3->reason;
                                  if($reason !=null && $reason !='' && $Advice !='default')
                                  {*/
                                  echo $form->field($model3, 'reason')->textInput(['class' => 'form-control','name'=>'res'])->label(false);
                                  //}
                             }
                             else 
                             {
                                echo $form->field($model4, 'Notes')->textInput(['class' => 'form-control','value'=>'','name'=>'res'])->label(false);
                             }

                    /* $form->field($model4, 'Notes')->textInput(['class' => 'form-control','value'=>'','name'=>'res'])->label(false) */
                     ?>  
                  </div>
                </div>		                     
                   
                  <div id="reason_div" class="row">
                  <label style="" class="col-sm-4 form-control-label"><?= Yii::t('app', 'Notes'); ?></label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <?= $form->field($model4, 'Notes')->textInput(['class' => 'form-control','value'=>'','name'=>'reason'])->label(false) ?>  
                  </div>
                </div><!-- row -->
				
				

              </div><!-- form-layout -->
            </div><!-- section-wrapper -->
                           
                           </div> 
                        </div>
                             <div class="col-lg-6">
                       <div class="card card-table">
                          <div class="card-header">
                          <h4 class="slim-card-title">Advice:</h4>
                         </div><!-- card-header -->
                                             
                  <div class="form-group row">
                        <div class="col-md-11">
                            <?php
                             $category=new Category();
                             if($model3!=null)//advices
                             {
                                  $Advice=$model3->advices;
                                  if($Advice !=null && $Advice !='' && $Advice !='default')
                                  {
                                  echo $form->field($model3, 'advices')->textArea(['rows' => '9','name'=>'advices'])->label(false);
                                  }
                                  else
                                  {
                                  echo $form->field($model3, 'advices')->textArea(['rows' => '9','value'=>$category->Advice1(),'name'=>'advices'])->label(false);
                                  }  

                             }
                             else 
                             {
                                echo $form->field($model4, 'advices')->textArea(['rows' => '9','value'=>$category->Advice1(),'name'=>'advices'])->label(false);
                             }
                             
                            /*  $Advice=$model4->advaices;
                              if($Advice !=null && $Advice !='' && $Advice !='default')
                              {
                              echo $form->field($model4, 'advaices')->textArea(['rows' => '9','name'=>'advices'])->label(false);
                              }
                              else
                              {
                              echo $form->field($model4, 'advaices')->textArea(['rows' => '9','value'=>$category->Advice1(),'name'=>'advices'])->label(false);
                              }  */                          
                            
                             ?>
                        </div>
                     </div>

                           </div> 
                        </div> 
                       
                         </div>
						 <br>
						
				<?php if($req->Request_Status=='Admitted')
			{
			
			 echo Html::submitButton('Check In', ['class' => 'btn btn-primary',
            'name' => 'Check', 'disabled'=>'true']);
			
			}
			 else{
			echo Html::submitButton('Check In', ['class' => 'btn btn-primary',
            'name' => 'Check']);
			 }?>
					
			
			<?php if($req->Request_Status=='Rejected')
			{
			
			 echo Html::submitButton('Reject', ['class' => 'btn btn-primary',
            'name' => 'Reject', 'disabled'=>'true']);
			
			}
			 else{
			echo Html::submitButton('Reject', ['class' => 'btn btn-primary',
            'name' => 'Reject']);
			 }?>
			 <?php if($req->Request_Status=='PendingAsk')
			{
			
			 echo Html::submitButton('Ask more', ['class' => 'btn btn-primary',
            'name' => 'Ask', 'disabled'=>'true']);
			
			}
			 else{
			echo Html::submitButton('Ask more', ['class' => 'btn btn-primary',
            'name' => 'Ask']);
			 }?>
			 <?php if($req->Request_Status=='Respond')
			{
			
			 echo Html::submitButton('Send', ['class' => 'btn btn-primary',
            'name' => 'Sendr', 'disabled'=>'true']);
			
			}
			 else{
			echo Html::submitButton('Send', ['class' => 'btn btn-primary',
            'name' => 'Sendr']);
			 }?>
			 
		
                         <?php ActiveForm::end(); ?> 
                    </div><!-- tab-pane -->  
                      
                      
                      
                  </div><!-- tab-content -->
                </div><!-- card-body -->
              </div><!-- card -->
            </div><!-- col -->
            
          </div><!-- row -->
        </div><!-- section-wrapper -->
     </div>
</div>

<script type="text/javascript" src="js/jquery.min.js">
</script>
<script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
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
     $("#select_status").val('<?php echo $model4->Notes ?>');
    
//chart    
new Chartist.Line('#chartLine1', {
  labels: ['02:00 AM', '02:30 AM', '04:00 AM', '04:30 AM','05:00 AM'],
  series: [
    [0, 90,180,270,300],
  ]
}, {
  fullWidth: true,
  chartPadding: {
    right: 40
  }
});
    
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
