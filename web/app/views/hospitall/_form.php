<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Hospital */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hospital-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Hosp_id')->textInput() ?>

    <?= $form->field($model, 'Hosp_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Hosp_desc')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Hosp_location')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Status')->dropDownList([ 'Enable' => 'Enable', 'Disable' => 'Disable', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
