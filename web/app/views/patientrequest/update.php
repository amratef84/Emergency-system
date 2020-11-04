<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PatientRequest */

$this->title = 'Update Patient Request: ' . $model->Request_Id;
$this->params['breadcrumbs'][] = ['label' => 'Patient Requests', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Request_Id, 'url' => ['view', 'id' => $model->Request_Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="patient-request-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
