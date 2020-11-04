<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SystemparametersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'System Parameters';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="systemparameters-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Systemparameters', ['create'], ['class' => 'btn btn-info']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'SP_id',
            'SP_item',
            'SP_value',
            'description',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
