<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Hospital */

$this->title = 'Update Hospital: ' . $model->employee_ID;
$this->params['breadcrumbs'][] = ['label' => 'Hospitals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->employee_ID, 'url' => ['view', 'id' => $model->employee_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hospital-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
