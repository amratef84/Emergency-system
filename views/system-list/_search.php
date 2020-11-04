<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SystemListSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="system-list-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Item_id') ?>

    <?= $form->field($model, 'Item') ?>

    <?= $form->field($model, 'Group_id') ?>

    <?= $form->field($model, 'Group_name') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>