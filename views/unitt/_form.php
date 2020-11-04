<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Unit */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row">
  <div class="col-sm-4"></div>
<div class="unit-form col-sm-4">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Unit_id')->textInput(['maxlength' => true,'readonly'=>'true']) ?>

    <?= $form->field($model, 'Unit_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Unit_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Unit_desc')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Capacity')->textInput() ?>

    <?= $form->field($model, 'Type_of_resources')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Hosp_id')->textInput() ?>

    <?= $form->field($model, 'Number_nurses')->textInput() ?>

    <?= $form->field($model, 'Number_doctors')->textInput() ?>

    <?= $form->field($model, 'Number_staff')->textInput() ?>

    <?= $form->field($model, 'Status')->dropDownList([ 'Enable' => 'Enable', 'Disable' => 'Disable', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'CurrentPatients')->textInput() ?>

    <?= $form->field($model, 'SavedPatient')->textInput() ?>

    <?= $form->field($model, 'AaitingPatient')->textInput() ?>

    <?= $form->field($model, 'admin_id')->textInput() ?>

    <?= $form->field($model, 'availability')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
  <div class="col-sm-4"></div>
</div>
</div>