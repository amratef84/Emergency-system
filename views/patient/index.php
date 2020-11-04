<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Patient;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PatientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'List of Patients';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-index">

    <h1><?= Html::encode($this->title) ?></h1>

   
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    

    

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
             // ['class' => 'yii\grid\SerialColumn'],

            'Patient_Id',
            'Patient_NId',
            'Patient_FName',
            'Patient_LName',
            'Patient_MPhone',
            
             /* [    
            'attribute' => 'fullName',
            'label' => 'Patient Name',
            'value' => function($model) { return $model->Patient_FName  . " " . $model->Patient_LName ;},
             ],*/
            
            ['class' => 'yii\grid\ActionColumn',
              
              'template' => '{view}', 
             
       'buttons' => [ 
                 'view' => function($url, $model)   {
                        return Html::a('<button class="btn btn-info">Make Request</button>', ['request/make_button', 'patient_id' => $model->Patient_Id]);
                    },
           
             /*'urlCreator' => function($action, $model, $key, $index) {
                      if ($action == 'view') {
                          return Html::a('Action', [view.php]);
                      }
                    
                    } */
                     
             ]
             ]
                    
        ],
    
    
    
    
    ]); ?>
    
    
    
    
    


</div>
