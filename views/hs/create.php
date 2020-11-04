<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\HospitalSession */

$this->title = 'Create Hospital Session';
$this->params['breadcrumbs'][] = ['label' => 'Hospital Sessions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hospital-session-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
