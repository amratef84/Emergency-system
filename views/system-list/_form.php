<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\SystemList;
use app\models\SymptomsGroup;
/* @var $this yii\web\View */
/* @var $model app\models\SystemList */
/* @var $model2 app\models\SymptomsGroup */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row">
  <div class="col-sm-4"></div>
<div class="system-list-form col-sm-4">

    <?php $form = ActiveForm::begin(); ?>
    <!--  <b>Item ID</b>
             <br></br> -->
           <?//= SystemList::IdCount(); ?>
           <br></br>
    
    <?= $form->field($model, 'Item_id')->textInput(['maxlength' => true,'readonly'=>'true']) ?>

    <?= $form->field($model, 'Item')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Group_id')->dropdownList(SymptomsGroup::find()
        ->select(['GroupName'])
        ->indexBy('Group_ID')
       ->column(),
    ['prompt'=>'Select SymptomsGroup']
);
 ?>
            
<?= "" ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
  <div class="col-sm-4"></div>
</div>
</div>