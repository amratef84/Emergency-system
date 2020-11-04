<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\HospitalEmployee */

$this->title = 'Create Hospital Employee';
$this->params['breadcrumbs'][] = ['label' => 'Hospital Employees', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hospital-employee-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
