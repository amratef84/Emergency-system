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

    <?php // echo $form->field($model, 'Type_of_resources') ?>

    <?php // echo $form->field($model, 'Hosp_id') ?>

    <?php // echo $form->field($model, 'Number_nurses') ?>

    <?php // echo $form->field($model, 'Number_doctors') ?>

    <?php // echo $form->field($model, 'Number_staff') ?>

    <?php // echo $form->field($model, 'Status') ?>

    <?php // echo $form->field($model, 'CurrentPatients') ?>

    <?php // echo $form->field($model, 'SavedPatient') ?>

    <?php // echo $form->field($model, 'AaitingPatient') ?>

    <?php // echo $form->field($model, 'admin_id') ?>

    <?php // echo $form->field($model, 'availability') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
