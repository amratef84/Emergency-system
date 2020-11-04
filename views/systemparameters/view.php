<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Systemparameters */

$this->title = $model->SP_id;
$this->params['breadcrumbs'][] = ['label' => 'Systemparameters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="systemparameters-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->SP_id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('Delete', ['delete', 'id' => $model->SP_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                 'method' => 'post',
            ],
        ])
         ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'SP_id',
            'SP_item',
            'SP_value',
            'description',
        ],
    ]) ?>

</div>
