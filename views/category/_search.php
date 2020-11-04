<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CategorySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Cat_ID') ?>

    <?= $form->field($model, 'Cat_code') ?>

    <?= $form->field($model, 'Cat_name') ?>

    <?= $form->field($model, 'Cat_color') ?>

    <?= $form->field($model, 'Cat_desc') ?>

    <?php // echo $form->field($model, 'score_criteria') ?>

    <?php // echo $form->field($model, 'Comp_sign') ?>

    <?php // echo $form->field($model, 'Status') ?>

    <?php // echo $form->field($model, 'Thresh_min') ?>

    <?php // echo $form->field($model, 'Thresh_max') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
