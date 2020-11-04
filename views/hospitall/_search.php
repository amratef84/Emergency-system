<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\HospitallSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hospital-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Hosp_id') ?>

    <?= $form->field($model, 'Hosp_name') ?>

    <?= $form->field($model, 'Hosp_desc') ?>

    <?= $form->field($model, 'Hosp_location') ?>

    <?= $form->field($model, 'Status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
