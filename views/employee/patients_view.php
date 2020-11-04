<?php
   use yii\helpers\Url;
   use yii\base\Model;
   use yii\helpers\Html;
   use yii\bootstrap\ActiveForm;
   use yii\helpers\ArrayHelper;
   use yii\grid\GridView;
   use app\models\RegisteredPatientAccount;
   use app\models\PatientSearch;
   use yii\db\Query;
   use yii\data\ActiveDataProvider;

/* @var $searchModel app\models\PatientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


 $this->title = 'PatientS View';

$this->params['breadcrumbs'][] = $this->title;
?>
  <?php $form = ActiveForm::begin(); ?>


    <h1><?= Html::encode($this->title) ?></h1>
    <p>
    </p>

  <div class="slim-mainpanel">
      <div class="container">
       <!--  <div class="slim-pageheader">
          <ol class="breadcrumb slim-breadcrumb">
            <li class="breadcrumb-item"><a href="#"></a></li>
            <li class="breadcrumb-item active" aria-current="page"></li>
          </ol>
          <h6 class="slim-pagetitle"><?//= Yii::t('app', 'Patients list'); ?></h6>
        </div>slim-pageheader 
     <br> 
      -->
 
          <br>

             <div class="section-wrapper">

          <div class="table-wrapper">
            <?php $data['model']= new RegisteredPatientAccount();
/*       $model= RegisteredPatientAccount::find()->all();

     $searchModel = new PatientSearch();
      //$model = RegisteredPatientAccount::find()->all();
      // $query = new Query();
$dataProvider = new ActiveDataProvider([
    'query' => RegisteredPatientAccount::find(),
    'pagination' => [
        'pageSize' => 20,
    ],

]);
*/
         echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
             ['class' => 'yii\grid\SerialColumn'],

            'Patient_Id',
            'Patient_NId',
            'Patient_FName',
            'Patient_LName',
            'Patient_MPhone',

            'Patient_Gender',
            'Account_Status',
            'Registration_Date',
            'Account_Type',
            /*'Patient_location',*/
                    ['class' => 'yii\grid\ActionColumn',

            'template' => ' {patient_info}',
            'buttons' => [
                'patient_info' => function($url,$data) {
                  //$Patient_Id => $this->input->post('Patient_Id');  
                     return Html::a('<button id="<?=$model->Patient_Id?>" class="btn btn-info view">View</button>',Url::to(['patient_info','id' => $data->Patient_Id]));//Request_Id $req_id
                     // 
                            }
                     ]           
            ],
             /* [    
            'attribute' => 'fullName',
            'label' => 'Patient Name',
            'value' => function($model) { return $model->Patient_FName  . " " . $model->Patient_LName ;},
             ],*/
            
           /* ['class' => 'yii\grid\ActionColumn',
              
              'template' => '{view}', 
             
       'buttons' => [ 
                 'view' => function($url, $model)   {
                        return Html::a('<button class="btn btn-info">Make Request</button>', ['request/make_button', 'patient_id' => $model->Patient_Id]);
                    },
              
                    
        ],*/
    
    ],
    
    
    ]); ?>
          
                 </div>
          </div>

         
         
          
          
      </div><!-- container -->
    </div><!-- slim-mainpanel -->
<script type="text/javascript" src="assets/js/jquery.min.js"></script>

<script>
$(function() {
     
       'use strict';
    var table = $('#datatable1').DataTable({
        iDisplayLength: 50, 
            language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
  
        });

  });
    </script>