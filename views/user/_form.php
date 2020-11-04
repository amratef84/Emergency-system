<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Hospital;
use yii\helpers\ArrayHelper;
use app\models\HospitalEmployee;
use app\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\Useraccount */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row">
  <div class="col-sm-4"></div>
<div class="useraccount-form col-sm-4">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'User_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Username')->textInput() ?>

    <?= $form->field($model, 'Password')->textInput() ?>

    <?= $form->field($model, 'Role_Id')->dropDownList($model->getDropDown()) ?>


    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    
    <?= $form->field($model1, 'employee_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model1, 'JopTitle')->textInput() ?>

    <?= $form->field($model1, 'Hosp_id')->dropDownList(ArrayHelper::map(hospital::find()->all(), 'Hosp_id', 'Hosp_name')) ?>

    <?= $form->field($model1, 'Status')->dropDownList([ 'Enabled' => 'Enabled', 'Disabled' => 'Disabled', ]) ?>
    <?= $form->field($model, 'Description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
  <div class="col-sm-4"></div>
</div>
</div>
