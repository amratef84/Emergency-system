<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SystemList */

$this->title = 'Update System List: ' . $model->Item_id;
$this->params['breadcrumbs'][] = ['label' => 'System Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Item_id, 'url' => ['view', 'id' => $model->Item_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="system-list-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
