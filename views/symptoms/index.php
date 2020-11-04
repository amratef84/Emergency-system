<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SymptomsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Symptoms';
$this->params['breadcrumbs'][] = ['label' => 'Setting Parameters', 'url' => ['site/settingparameter']];

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="symptoms-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Symptom', ['create'], ['class' => 'btn btn-info']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],

            'Symp_ID',
'Symp_Group',
'Symp_name',
 'Symp_desc',
  'Score',
'AdultScore',
'pediatric_score',
'Type',
'Target',
'Status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
