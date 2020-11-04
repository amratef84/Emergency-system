<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Sensor;
use app\models\Symptoms;

/* @var $this yii\web\View */
/* @var $model app\models\Symsen */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row">
  <div class="col-sm-4"></div>
<div class="symsen-form col-sm-4">

    <?php $form = ActiveForm::begin(); ?>

    <?php
     //= $form->field($model, 'Sen_ID')->textInput()
      ?>
               <label><?= Yii::t('app', 'Sensor Name'); ?></label>
 			<?php
 				echo $form->field($model, 'Sen_ID')->dropdownList(Sensor::find()
                            ->select(['SensorName'])
                            ->indexBy('SensorID')
                           ->column(),
                       /* ['readonly'=>'true','disabled'=>'true']*/
                      )->label(false);
                          ?>
    <label><?= Yii::t('app', 'Min Value'); ?></label>
    <?= $form->field($model, 'Rang_Min')->textInput()->label(false) ?>
    <label><?= Yii::t('app', 'Max Value'); ?></label>
    <?= $form->field($model, 'Rang_Max')->textInput()->label(false) ?>

    <?php
    //= $form->field($model, 'Sym_ID')->textInput() 
    ?>
               <label><?= Yii::t('app', 'Symptom Name'); ?></label>

    <?php 
 				echo $form->field($model, 'Sym_ID')->dropdownList(Symptoms::find()
                            ->select(['Symp_name'])
                            ->indexBy('Symp_ID')
                           ->column(),
                       /* ['readonly'=>'true','disabled'=>'true']*/
                      )->label(false);
                          ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
  <div class="col-sm-4"></div>
  </div>
