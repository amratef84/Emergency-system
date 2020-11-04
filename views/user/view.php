<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Useraccount */

$this->title = 'View User Account: ' .$model->User_ID;
$this->params['breadcrumbs'][] = ['label' => 'Useraccounts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->User_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->User_ID], [
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
            'User_ID',
            'Username:ntext',
            'Password:ntext',
            'Role_Id',
            'Category',
            'Description:ntext',
            'Status',
            'email:email',
            'reset_token',
        ],
    ]) ?>

</div>
