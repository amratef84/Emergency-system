<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PatientRequestSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="patient-request-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Request_Id') ?>

    <?= $form->field($model, 'Patient_Id') ?>

    <?= $form->field($model, 'RequestTime') ?>

    <?= $form->field($model, 'Request_Status') ?>

    <?= $form->field($model, 'Request_Type') ?>

    <?php // echo $form->field($model, 'Estimated_score') ?>

    <?php // echo $form->field($model, 'Estimated_Level') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
