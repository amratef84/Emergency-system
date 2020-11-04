<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Hospital */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hospital-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'employee_ID')->textInput() ?>

    <?= $form->field($model, 'employee_Type')->textInput() ?>

    <?= $form->field($model, 'employee_Email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'JopTitle')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Hosp_id')->textInput() ?>

    <?= $form->field($model, 'Status')->dropDownList([ 'Enabled' => 'Enabled', 'Disabled' => 'Disabled', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
