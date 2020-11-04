<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\hospitalemployee */

$this->title = 'Create Hospitalemployee';
$this->params['breadcrumbs'][] = ['label' => 'Hospitalemployees', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hospitalemployee-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
