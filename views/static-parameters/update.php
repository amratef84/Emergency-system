<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\HospitalEmployee */
$this->title = 'Update Hospital Employee: ' . $model->employee_ID;
$this->params['breadcrumbs'][] = ['label' => 'Setting hospital-employee', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Add User', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->employee_ID, 'url' => ['view', 'id' => $model->employee_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hospital-employee-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
