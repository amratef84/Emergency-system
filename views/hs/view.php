<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\HospitalSession */

$this->title = $model->Session_ID;
$this->params['breadcrumbs'][] = ['label' => 'Hospital Sessions', 'url' => ['View']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="hospital-session-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update Session Status', ['update', 'id' => $model->Session_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->Session_ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Session_ID',
            'Request_Id',
            'Ticket_ID',
            'Cat_ID',
            'patient_status',
            'Hosp_decision',
            'Unit_id',
            'Covid_status',
            'employee_ID',
            'advices:ntext',
            'calculated_Score',
            'Session_status',
            'Date',
        ],
    ]) ?>

</div>
