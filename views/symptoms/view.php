<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Symptoms */

$this->title =  'View Symptoms: ' .$model->Symp_ID;
$this->params['breadcrumbs'][] = ['label' => 'Symptoms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="symptoms-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->Symp_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->Symp_ID], [
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
            'Symp_ID',
'Symp_Group',
'Symp_name',
 'Symp_desc',
  'Score',
'AdultScore',
'pediatric_score',
'Type',
'Target',
'Status',
        ],
    ]) ?>

</div>
