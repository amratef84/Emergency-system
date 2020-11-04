<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
<!-- <div class="row">
<div class="col-lg-3">
            </div>
 <div class="col-lg-5"> -->
  <center>
<div class="site-login ">
  <h1><?= Html::encode($this->title) ?></h1>

  <p>Please fill out the following fields to login:</p>
<div class="col-lg-4">
  </div>
            <div class="col-lg-4">

  <?php $form = ActiveForm::begin([
    'id' => 'login-form',
    'layout' => 'horizontal',
    'fieldConfig' => [
      'template' => "{label}\n<div class=\"col-lg\">{input}</div>\n<div class=\"col-lg-5\">{error}</div>",
      'labelOptions' => ['class' => 'col-lg-1 control-label'],
    ],
  ]); ?>

  <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

  <?= $form->field($model, 'password')->passwordInput() ?>
    

  <?= $form->field($model, 'rememberMe')->checkbox([
    'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
  ]) ?>


</div>
  <div class="form-group">
    <div class="col-lg-offset-1 col-lg-10">
      <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
      <?=Html::a('Forgot Password?',['/site/forgot'])?>
    </div>
  </div>


  <?php ActiveForm::end(); ?>
</div>

</center>
</div> 
