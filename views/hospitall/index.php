<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\HospitallSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hospitals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hospital-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Hospital', ['create'], ['class' => 'btn btn-info']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
         //   ['class' => 'yii\grid\SerialColumn'],

            'Hosp_id',
            'Hosp_name',
            'Hosp_desc:ntext',
            'Hosp_location',
            'Status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
