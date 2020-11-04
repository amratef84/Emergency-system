<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PatientRequest */

$this->title = 'Create Patient Request';
$this->params['breadcrumbs'][] = ['label' => 'Patient Requests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-request-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
