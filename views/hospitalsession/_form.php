<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\HospitalSession */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hospital-session-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Session_ID')->textInput() ?>

    <?= $form->field($model, 'Request_Id')->textInput() ?>

    <?= $form->field($model, 'Ticket_ID')->textInput() ?>

    <?= $form->field($model, 'Cat_ID')->textInput() ?>

    <?= $form->field($model, 'patient_status')->dropDownList([ 'stable' => 'Stable', 'unstable' => 'Unstable', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'Hosp_decision')->textInput() ?>

    <?= $form->field($model, 'Unit_id')->textInput() ?>

    <?= $form->field($model, 'Covid_status')->textInput() ?>

    <?= $form->field($model, 'employee_ID')->textInput() ?>

    <?= $form->field($model, 'advices')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'calculated_Score')->textInput() ?>

    <?= $form->field($model, 'Session_status')->dropDownList([ 'In progress' => 'In progress', 'Closed' => 'Closed', 'In service' => 'In service', 'pending' => 'Pending', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
