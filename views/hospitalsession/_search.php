<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\HospitalSessionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hospital-session-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Session_ID') ?>

    <?= $form->field($model, 'Request_Id') ?>

    <?= $form->field($model, 'Ticket_ID') ?>

    <?= $form->field($model, 'Cat_ID') ?>

    <?= $form->field($model, 'patient_status') ?>

    <?php // echo $form->field($model, 'Hosp_decision') ?>

    <?php // echo $form->field($model, 'Unit_id') ?>

    <?php // echo $form->field($model, 'Covid_status') ?>

    <?php // echo $form->field($model, 'employee_ID') ?>

    <?php // echo $form->field($model, 'advices') ?>

    <?php // echo $form->field($model, 'calculated_Score') ?>

    <?php // echo $form->field($model, 'Session_status') ?>

    <?php // echo $form->field($model, 'Date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
