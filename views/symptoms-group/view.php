<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SymptomsGroup */

$this->title =  'View Symptoms Group: ' .$model->Group_ID;
$this->params['breadcrumbs'][] = ['label' => 'SymptomsGroup', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="SymptomsGroup-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->Group_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->Group_ID], [
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
            'Group_ID',
            'GroupName',
            'GroupDesc',
            'Cat_Desc',
            'ScoringType',
            'Status',
        ],
    ]) ?>

</div>
