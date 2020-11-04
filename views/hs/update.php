<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\HospitalSession */

$this->title = 'Update Hospital Session: ' . $model->Session_ID;
$this->params['breadcrumbs'][] = ['label' => 'Hospital Sessions', 'url' => ['list?unit_id='.$model->Unit_id]];
$this->params['breadcrumbs'][] = ['label' => $model->Session_ID, 'url' => ['view', 'id' => $model->Session_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hospital-session-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
