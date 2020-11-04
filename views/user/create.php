<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Useraccount */

$this->title = 'Add New User Account';
$this->params['breadcrumbs'][] = ['label' => 'Useraccounts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="useraccount-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
      'model' => $model,
      'model1' => $model1,
    ]) ?>

</div>
