<?php

use yii\helpers\Html;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User accounts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Useraccount', ['create'], ['class' => 'btn btn-info']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<?= GridView::widget([
  'dataProvider' => $dataProvider,
  'filterModel' => $searchModel,
  'columns' => [
    // ['class' => 'yii\grid\SerialColumn'],

    'User_ID',
    'Username:ntext',
    // 'Password:ntext',
    [
      'class' => 'yii\grid\DataColumn',
      'attribute' => 'Role_Id',
      'value' => function($model){
        return $model->getRoleName();
      }],
      // 'Category',
      'Description:ntext',
      //'Status',
      'email:email',
      //'reset_token',

      ['class' => 'yii\grid\ActionColumn'],
  ],
]); ?>


</div>
