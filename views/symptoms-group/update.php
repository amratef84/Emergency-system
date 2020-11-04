<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Category */

$this->title = 'Update Symptoms Group: ' . $model->Group_ID;
$this->params['breadcrumbs'][] = ['label' => 'SymptomsGroups', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Group_ID, 'url' => ['view', 'id' => $model->Group_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="SymptomsGroup-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
