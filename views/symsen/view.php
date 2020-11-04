<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Sensor;
use app\models\Symptoms;
/* @var $this yii\web\View */
/* @var $model app\models\Symsen */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Symptom Sensor', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="symsen-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>


                     <div class="col-lg-2"></div> 
                      <div class="col-lg-8">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID',
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
        ],
    ]) ?>

     </div> 
   <div class="col-lg-2"></div> 
</div>
