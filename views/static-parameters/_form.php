<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\HospitalEmployee;

/* @var $this yii\web\View */
/* @var $model app\models\HospitalEmployee */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hospital-employee-form">

    <?php $form = ActiveForm::begin(); ?>
    <b>Employee ID</b>
             <br></br>
           <?= HospitalEmployee::IdCount(); ?>
           <br></br>

    

    <?= $form->field($model, 'employee_Type')->textInput() ?>

    <?= $form->field($model, 'employee_Email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'JopTitle')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Hosp_id')->textInput() ?>

    <?= $form->field($model, 'Status')->dropDownList([ 'Enabled' => 'Enabled', 'Disabled' => 'Disabled', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
