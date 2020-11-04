<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\SystemList;
use app\models\SymptomsGroup;
use yii\db\Query;
/* @var $this yii\web\View */
/* @var $searchModel app\models\SystemListSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'System Lists';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="system-list-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create System List', ['create'], ['class' => 'btn btn-info']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
          //  ['class' => 'yii\grid\SerialColumn'],
            'Item_id',
            'Item',
            'Group_id',
            [
        'label'=>'Group',
        'attribute'=>'GroupName',
        'value'=> function($model){
        $SymptomsGroup= SymptomsGroup::find()->where(['Group_ID'=>$model->Group_id])->one();
        return $SymptomsGroup->GroupName;
        }
      ],                       
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
