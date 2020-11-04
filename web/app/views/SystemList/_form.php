<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SystemList */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="system-list-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Item')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Group_id')->textInput() ?>

    <?= $form->field($model, 'Group_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
