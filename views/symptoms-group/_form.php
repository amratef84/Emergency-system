<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\SymptomsGroup;

/* @var $this yii\web\View */
/* @var $model app\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>
<center>
<div class="row">
  <div class="col-sm-4"></div>
<div class="SymptomsGroup-form col-sm-4">

    <?php $form = ActiveForm::begin(); ?>
   <!--  <b>Group ID</b>
        <br></br> -->
    <?//= SymptomsGroup::IdCount(); ?>
        <br></br>
    
    <?= $form->field($model, 'Group_ID')->textInput(['maxlength' => true,'readonly'=>'true']) ?>

    <?= $form->field($model, 'GroupName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'GroupDesc')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'Cat_Desc')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'ScoringType')->dropDownList([ 'individual' => 'individual', 'Group' => 'Group'], ['selected' => 'individual']) ?>
    <?= $form->field($model, 'Status')->dropDownList([ 'Enabled' => 'Enabled', 'Disabled' => 'Disabled', ], ['selected' => 'Enabled']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
  <div class="col-sm-4"></div>
</div>
</div>
</center>

