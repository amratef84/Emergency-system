<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SystemList */

$this->title = 'Create System List';
$this->params['breadcrumbs'][] = ['label' => 'System Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="system-list-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
