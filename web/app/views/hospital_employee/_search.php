<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\hospital_employeeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hospitalemployee-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'employee_ID') ?>

    <?= $form->field($model, 'employee_Type') ?>

    <?= $form->field($model, 'employee_Email') ?>

    <?= $form->field($model, 'JopTitle') ?>

    <?= $form->field($model, 'Hospital_Id') ?>

    <?php // echo $form->field($model, 'Status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
