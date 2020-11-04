<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SymptomsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="symptoms-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Symp_ID') ?>

    <?= $form->field($model, 'Symp_Group') ?>

    <?= $form->field($model, 'Symp_name') ?>

    <?= $form->field($model, 'Symp_desc') ?>
     <?= $form->field($model, 'Score') ?>


    <?= $form->field($model, 'AdultScore') ?>

    <?= $form->field($model, 'pediatric_score') ?>
 <?= $form->field($model, 'Type') ?>
 <?= $form->field($model, 'Target') ?>
 <?= $form->field($model, 'Status') ?>


    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
