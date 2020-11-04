<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SystemListSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'System Lists';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="system-list-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create System List', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Item_id',
            'Item',
            'Group_id',
            'Group_name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
