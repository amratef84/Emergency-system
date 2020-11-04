<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UnitSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Units';
$this->params['breadcrumbs'][] = ['label' => 'Setting Units ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unit-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Unit', ['create'], ['class' => 'btn btn-info']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],

         
            'Unit_name',
            'Unit_id', 
                [
              'attribute' => 'Hosp_id',
                'value' => 'hospital.Hosp_name',
            ],
          'Number_nurses',
            'Number_doctors',
            'Number_staff',
            'Status',
            
           
            

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
