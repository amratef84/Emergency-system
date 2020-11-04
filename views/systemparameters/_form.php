<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Systemparameters */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row">
  <div class="col-sm-4"></div>
<div class="systemparameters-form col-sm-4">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'SP_item')->textInput(['maxlength' => true,'readonly'=>'true']) ?>

    <?= $form->field($model, 'SP_value')->textInput() ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true,'readonly'=>'true']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
  <div class="col-sm-4"></div>
</div>
