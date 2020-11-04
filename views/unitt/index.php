<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use app\models\Hospital;
/* @var $this yii\web\View */
/* @var $searchModel app\models\UnitSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Units';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unit-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
       
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'Unit_id',
           // 'Unit_code',
          
            [
		 'label'=>'Hospital name',
            'class' => 'yii\grid\DataColumn',
             'attribute'=>'Hosp_id',	
            'value' => function ($data) {
                $hosp_name = Hospital::findOne($data->Hosp_id)->Hosp_name;
                return $hosp_name; 
            },
        ],
        
        
            'Unit_name',
           // 'Unit_desc:ntext',
            'Capacity',
            'Type_of_resources',
            'Hosp_id',
            'Number_nurses',
            'Number_doctors',
            'Number_staff',
            //'Status',
            //'CurrentPatients',
            //'SavedPatient',
            //'AaitingPatient',
            //'admin_id',
            //'availability',

              ['class' => 'yii\grid\ActionColumn',
             
              'template' => '{view}', 
             
       'buttons' => [
                 'view' => function($url, $model)   {
                        return Html::a('<button class="btn btn-info">view</button>',Url::to(['hs/index','unit_id'=>$model->Unit_id]));
                    },
          
                
                 
             ]
            
            
            
            
            ]
            
            
       
            
           
        ],
    
    
    
    
    ]); ?>

</div>
