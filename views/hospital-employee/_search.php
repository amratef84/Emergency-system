<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\HospitalEmployeeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hospital-employee-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'employee_index') ?>

    <?= $form->field($model, 'employee_ID') ?>

    <?= $form->field($model, 'employee_name') ?>

    <?= $form->field($model, 'employee_Type') ?>

    <?= $form->field($model, 'employee_Email') ?>

    <?php // echo $form->field($model, 'JopTitle') ?>

    <?php // echo $form->field($model, 'Hosp_id') ?>

    <?php // echo $form->field($model, 'Status') ?>

    <?php // echo $form->field($model, 'User_ID') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
