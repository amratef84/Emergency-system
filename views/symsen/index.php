<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Sensor;
use app\models\Symptoms;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SymsenSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Symptoms Sensors';
$this->params['breadcrumbs'][] = $this->title;
?>
<style type="text/css">
    .space
    {
        margin-top: 100px;
    }
</style>
<div class="symsen-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Symptom_Sensor', ['create'], ['class' => 'btn btn-info']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            /*'ID',*/
            // 'Sen_ID',
             [
         'label'=>'Sensor Name',
            'class' => 'yii\grid\DataColumn',
             'attribute'=>'Sen_ID', 
            'value' => function ($data) {
                $name = Sensor::findOne($data->Sen_ID)->SensorName;
              return $name; 
            },
        ],
            'Rang_Min',
            'Rang_Max',
            // 'Sym_ID',
            [
            'label'=>'Symptom Name',
            'class' => 'yii\grid\DataColumn',
             'attribute'=>'Sym_ID', 
            'value' => function ($data) {
                $Syp_name = Symptoms::findOne($data->Sym_ID)->Symp_name;
              return $Syp_name; 
            },
        ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
<div class="space" ></div>
