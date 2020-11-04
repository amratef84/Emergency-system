<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Unit */

$this->title = $model->Unit_id;
$this->params['breadcrumbs'][] = ['label' => 'Units', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="unit-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->Unit_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->Unit_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Unit_id',
            'Unit_code',
            'Unit_name',
            'Unit_desc:ntext',
            'Capacity',
            'Type_of_resources',
            'Hosp_id',
            'Number_nurses',
            'Number_doctors',
            'Number_staff',
            'Status',
            'CurrentPatients',
            'SavedPatient',
            'AaitingPatient',
            'admin_id',
            'availability',
        ],
    ]) ?>

</div>
