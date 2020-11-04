<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Symptoms;



/* @var $this yii\web\View */
/* @var $model app\models\Symptoms */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row">
  <div class="col-sm-4"></div>
<div class="symptoms-form col-sm-4">


    <?php $form = ActiveForm::begin();  ?>
  

<!-- <b>Symptom ID</b>
             <br></br> -->
           <?//= Symptoms::IdCount(); ?>
           <br></br>
    

    <?= $form->field($model, 'Symp_Group')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Symp_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Symp_desc')->textInput() ?>

    <?= $form->field($model, 'Score')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'AdultScore')->textInput() ?>

    <?= $form->field($model, 'pediatric_score')->textInput() ?>

    <?= $form->field($model, 'Type')->dropDownList([ 'vital signs' => 'vital signs', 'text Q' => 'text Q', ], ['prompt' => '']) ?>
        <?= $form->field($model, 'Target')->dropDownList([ 'only-patient' => 'only-patient', 'only-hospital' => 'only-hospital','both' => 'both', ], ['prompt' => '']) ?>
    <?= $form->field($model, 'Status')->dropDownList([ 'Enable' => 'Enable', 'Disable' => 'Disable' ]) ?>


     <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-info']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
  <div class="col-sm-4"></div>
</div>
