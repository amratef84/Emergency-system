<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\SystemList;
use app\models\SymptomsGroup;
use yii\db\Query;
/* @var $this yii\web\View */
/* @var $model app\models\SystemList */

$this->title =  'View System List: ' .$model->Item_id;
$this->params['breadcrumbs'][] = ['label' => 'System Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="system-list-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->Item_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->Item_id], [
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
        ],
    ]) ?>

</div>