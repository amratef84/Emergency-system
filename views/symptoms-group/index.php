<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Symptoms Group';
$this->params['breadcrumbs'][] = ['label' => 'Setting Parameters', 'url' => ['site/settingparameter']];

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="SymptomsGroup-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Symptom Group', ['create'], ['class' => 'btn btn-info']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Group_ID',
            'GroupName',
            'ScoringType',
            'Status',
            'GroupDesc',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
