<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PatientRequestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Patient Requests';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-request-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Patient Request', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Request_Id',
            'Patient_Id',
            'RequestTime',
            'Request_Status',
            'Request_Type',
            //'Estimated_score',
            //'Estimated_Level',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
