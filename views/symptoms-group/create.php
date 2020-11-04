<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Category */

$this->title = 'Create New Symptoms Group';
$this->params['breadcrumbs'][] = ['label' => 'Symptoms Group', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="SymptomsGroup-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
