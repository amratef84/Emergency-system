<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Forgot Password';
$this->params['breadcrumbs'][] = $this->title;
?>
<center>
  <div class="row">
     <div class="col-lg-4">
     </div>
     <div class="col-lg-5">
     
<div class="site-login">
  <h1><?= Html::encode($this->title) ?></h1>

  <p>Please write your email: </p>

  <?php $form = ActiveForm::begin(
    ['id' => 'login-form',
     'layout' => 'horizontal',
     'fieldConfig' => [
       'labelOptions' => ['class' => 'col-lg-3 control-label'],
     ],
  ]); ?>

  <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>
  <div class="form-group">
    <div class="">
      <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
    </div>
  </div>
  <?php if($sent == true){ ?> 
    <div style="color: green">
      Your reset link sent to your email.
    </div>
  <?php } ?>
  <?php ActiveForm::end(); ?>
</div>
</div>
</div>
</center>
