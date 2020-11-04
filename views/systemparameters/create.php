<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Systemparameters */

$this->title = 'Create System Parameters';
$this->params['breadcrumbs'][] = ['label' => 'Systemparameters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="systemparameters-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
