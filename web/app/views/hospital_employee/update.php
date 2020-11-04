<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\hospitalemployee */

$this->title = 'Update Hospitalemployee: ' . $model->employee_ID;
$this->params['breadcrumbs'][] = ['label' => 'Hospitalemployees', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->employee_ID, 'url' => ['view', 'id' => $model->employee_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hospitalemployee-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
