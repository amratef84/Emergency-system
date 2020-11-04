<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\HospitalSession */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
  <div class="col-sm-4"></div>
<div class="hospital-session-form col-sm-4">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Session_ID')->textInput(['maxlength' => true,'readonly'=>'true'])?> 

    <?= $form->field($model, 'Request_Id')->textInput(['maxlength' => true,'readonly'=>'true'])?>

    <?= $form->field($model, 'Session_status')->dropDownList([ 'In progress' => 'In progress', 'Closed' => 'Closed', 'In service' => 'In service','Pending'=>'Pending']) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
  <div class="col-sm-4"></div>
</div>
