<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\hospitalemployee */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hospitalemployee-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'employee_ID')->textInput() ?>

    <?= $form->field($model, 'employee_Type')->dropDownList([ 'Doctor' => 'Doctor', 'Nurse' => 'Nurse', 'Staff' => 'Staff', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'employee_Email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'JopTitle')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Hospital_Id')->textInput() ?>

    <?= $form->field($model, 'Status')->dropDownList([ 'Enabled' => 'Enabled', 'Disabled' => 'Disabled', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
