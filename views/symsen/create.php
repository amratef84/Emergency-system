<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Symsen */

$this->title = 'Create Symsen';
$this->params['breadcrumbs'][] = ['label' => 'Symsens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="symsen-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
