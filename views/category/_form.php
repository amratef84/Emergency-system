<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Category

/* @var $this yii\web\View */
/* @var $model app\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row">
  <div class="col-sm-4"></div>
<div class="category-form col-sm-4">

    <?php $form = ActiveForm::begin(); ?>
    <!--   <b>Category ID</b>
         <br></br> -->
    <?//= Category::IdCount(); ?>
           <br></br>

   
    <?= $form->field($model, 'Cat_ID')->textInput(['maxlength' => true,'readonly'=>'true']) ?>

    <?= $form->field($model, 'Cat_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Cat_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Cat_color')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Cat_desc')->textarea(['rows' => 6]) ?>


    <?= $form->field($model, 'Status')->dropDownList([ 'Enable' => 'Enable', 'Disable' => 'Disable' ]) ?>

    <?= $form->field($model, 'Thresh_min')->textInput() ?>

    <?= $form->field($model, 'Thresh_max')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
  <div class="col-sm-4"></div>
</div>