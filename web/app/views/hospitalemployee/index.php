<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\HospitalEmployeeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hospital Employees';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hospital-employee-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Hospital Employee', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'employee_ID',
            'employee_Type',
            'employee_Email:email',
            'JopTitle:ntext',
            'Hosp_id',
            //'Status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
