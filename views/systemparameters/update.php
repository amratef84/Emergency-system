<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Systemparameters */

$this->title = 'Update System Parameters: ' . $model->SP_id;
$this->params['breadcrumbs'][] = ['label' => 'Systemparameters', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->SP_id, 'url' => ['view', 'id' => $model->SP_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="systemparameters-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
