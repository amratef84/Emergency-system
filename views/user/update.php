<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Useraccount */

$this->title = 'Update User Account: ' . $model->User_ID;
$this->params['breadcrumbs'][] = ['label' => 'Useraccounts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->User_ID, 'url' => ['view', 'id' => $model->User_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
 'model' => $model, 'model1' => $model1,
    ]) ?>

</div>
