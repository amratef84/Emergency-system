<?php
   use yii\helpers\Url;
   use yii\base\Model;
   use yii\helpers\Html;
   use yii\bootstrap\ActiveForm;
   use yii\helpers\ArrayHelper;
   use yii\grid\GridView;
   use yii\db\Query;
   use app\model\PatientSearch;
   use app\model\RegisteredPatientAccount;
   use yii\data\ActiveDataProvider;
/* @var $this P_employeeController */

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
 
          <br>

             <div class="section-wrapper">

          <div class="table-wrapper">

            <?php
      // $model= new  RegisteredPatientAccount;

     /*$searchModel = new PatientSearch();*/
      //$model = RegisteredPatientAccount::find()->all();
      // $query = new Query();
$dataProvider = new ActiveDataProvider([
    'query' => RegisteredPatientAccount::find(),
    'pagination' => [
        'pageSize' => 20,
    ],

]);

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
            'Patient_location',
                    ['class' => 'yii\grid\ActionColumn', 
            'attribute'=>'Patient_Id', 
            'template' => ' {view}',
            'buttons' => [
                'view' => function($model){
                     return Html::a('<button id="<?=$model->Patient_Id?>" class="btn btn-info view">View</button>',Url::to(['patient_info/',['#']]/*'id' => $model->Patient_Id]*/));//Request_Id $req_id
                     // 
                            }
                     ]           
            ],
    
    ],
    
    
    ]); ?>
          
                 </div>
          </div>

         
         
          
          
      </div><!-- container -->
    </div><!-- slim-mainpanel -->