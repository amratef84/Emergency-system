<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Forgot Password';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
  <h1><?= Html::encode($this->title) ?></h1>


  <?php $form = ActiveForm::begin(
    ['id' => 'login-form',
     'layout' => 'horizontal',
     'fieldConfig' => [
      'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
      'labelOptions' => ['class' => 'col-lg-1 control-label'],
     ],
  ]); ?>

  
  <?= $form->field($model, 'password')->textInput(['autofocus' => true, 'type' => 'password'])->label('New Password') ?>
  <?= $form->field($model, 'password2')->textInput(['autofocus' => true, 'type' => 'password'])->label('Password Confirm') ?>
  <div class="form-group">
    <div class="col-lg-offset-1 col-lg-11">
      <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
    </div>
  </div>
  <?php if($done == true){ ?> 
    <div style="color: green">
      Password successfully changed.
    </div>
  <?php } ?>
  <?php ActiveForm::end(); ?>
</div>
