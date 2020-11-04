<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UnitSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="unit-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Unit_id') ?>

    <?= $form->field($model, 'Unit_code') ?>

    <?= $form->field($model, 'Unit_name') ?>

    <?= $form->field($model, 'Unit_desc') ?>

    <?= $form->field($model, 'Capacity') ?>

   <?= $form->field($model, 'Type_of_resources') ?>

    <?= $form->field($model, 'Hosp_id') ?>

    <?= $form->field($model, 'Number_nurses') ?>

    <?= $form->field($model,'Number_doctors') ?>

    <?= $form->field($model, 'Number_staff') ?>

    <?= $form->field($model, 'Status') ?>
    
     <?= $form->field($model, 'CurrentPatients') ?>
    
     <?= $form->field($model, 'ServedPatient') ?>
    
     <?= $form->field($model, 'AdmittingPatient') ?>
    
    <?= $form->field($model, 'admin_id') ?>
    
    <?= $form->field($model, 'availability') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
