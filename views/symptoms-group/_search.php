<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SymptomsGroupsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="symptoms-groups-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Group_ID') ?>

    <?= $form->field($model, 'GroupName') ?>

    <?= $form->field($model, 'GroupDesc') ?>

    <?= $form->field($model, 'ScoringType') ?>

    <?= $form->field($model, 'Cat_Desc') ?>

    <?php // echo $form->field($model, 'Status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
