<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PatientRequest */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="patient-request-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Patient_Id')->textInput() ?>

    <?= $form->field($model, 'RequestTime')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Request_Status')->textInput() ?>

    <?= $form->field($model, 'Request_Type')->dropDownList([ 'By Patient' => 'By Patient', 'By ED' => 'By ED', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'Estimated_score')->textInput() ?>

    <?= $form->field($model, 'Estimated_Level')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
