<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\HospitalSessionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hospital Sessions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hospital-session-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Hospital Session', ['create'], ['class' => 'btn btn-info']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Session_ID',
            'Request_Id',
            'Ticket_ID',
            'Cat_ID',
            'patient_status',
            //'Hosp_decision',
            //'Unit_id',
            //'Covid_status',
            //'employee_ID',
            //'advices:ntext',
            //'calculated_Score',
            //'Session_status',
            //'Date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
