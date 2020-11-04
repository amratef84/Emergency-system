<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Symptoms */

$this->title = 'Update Stymptom: ' . $model->Symp_ID;
$this->params['breadcrumbs'][] = ['label' => 'Symptoms', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Symp_ID, 'url' => ['view', 'id' => $model->Symp_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="symptoms-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
