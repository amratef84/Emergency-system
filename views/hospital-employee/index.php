<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\HospitalEmployeeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Add Hospital Admin';
$this->params['breadcrumbs'][] = ['label' => 'Setting hospital-employee ', 'url' => ['/hospital-employee']];

?>
<div class="hospital-employee-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Hospital Employee', ['create'], ['class' => 'btn btn-info']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
          //  ['class' => 'yii\grid\SerialColumn'],

            'employee_index',
            'employee_ID',
            'employee_name',
            'employee_Type',
            'employee_Email:email',
            //'JopTitle:ntext',
            [
              'attribute' => 'Hosp_id',
                'value' => 'hospital.Hosp_name',
            ],
            //'Status',
            //'User_ID',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
