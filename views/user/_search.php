<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="useraccount-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'User_ID') ?>

    <?= $form->field($model, 'Username') ?>

    <?= $form->field($model, 'Password') ?>

    <?= $form->field($model, 'Role_Id') ?>

    <?= $form->field($model, 'Category') ?>

    <?php // echo $form->field($model, 'Description') ?>

    <?php // echo $form->field($model, 'Status') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'reset_token') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
