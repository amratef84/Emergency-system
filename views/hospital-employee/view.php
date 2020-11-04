
<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\HospitalEmployee */

$this->title = 'View Hospital Employee: ' .$model->employee_index;
$this->params['breadcrumbs'][] = ['label' => 'Hospital Employees', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="hospital-employee-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->employee_index], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->employee_index], [
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
            'employee_index',
            'employee_ID',
            'employee_name',
            'employee_Type',
            'employee_Email:email',
            'JopTitle:ntext',
            'Hosp_id',
            'Status',
            'User_ID',
        ],
    ]) ?>

</div>