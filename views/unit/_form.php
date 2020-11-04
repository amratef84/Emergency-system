<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Hospital;
use yii\helpers\ArrayHelper;
use app\models\Unit;


/* @var $this yii\web\View */
/* @var $model app\models\Unit */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row">
  <div class="col-sm-4"></div>
<div class="unit-form col-sm-4">
    <?php $form = ActiveForm::begin(); ?>
    <!-- <b>Unit ID</b>
             <br></br> -->
           <?//= Unit::IdCount(); ?>
           <br></br>

    <?= $form->field($model, 'Unit_id')->textInput(['maxlength' => true,'readonly'=>'true']) ?>

    <?= $form->field($model, 'Unit_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Unit_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Unit_desc')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Capacity')->textInput() ?>

    <?= $form->field($model, 'Type_of_resources')->textInput(['maxlength' => true]) ?>

     <?= $form->field($model, 'Hosp_id')->dropDownList(ArrayHelper::map(hospital::find()->all(), 'Hosp_id', 'Hosp_name')) ?>


    <?= $form->field($model, 'Number_nurses')->textInput() ?>

    <?= $form->field($model, 'Number_doctors')->textInput() ?>

    <?= $form->field($model, 'Number_staff')->textInput() ?>
    
    <?= $form->field($model, 'Status')->dropDownList([ 'Enable' => 'Enable', 'Disable' => 'Disable']) ?>
    
    <?= $form->field($model, 'CurrentPatients')->textInput() ?>
    
    <?= $form->field($model, 'ServedPatient')->textInput() ?>
    
    <?= $form->field($model, 'AdmittingPatient')->textInput() ?>
    
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