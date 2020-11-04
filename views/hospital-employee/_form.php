<?php

use yii\helpers\Html;
use app\models\HospitalEmployee;
use app\models\User;

use yii\widgets\ActiveForm;
use app\models\Hospital;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\HospitalEmployee */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hospital-employee-form">



    <?php $form = ActiveForm::begin(); ?>

    
    <b>Employee ID</b>
             <br></br>
           <?= HospitalEmployee::IdCount(); ?>
           <br></br>

 
 
    <?= $form->field($model, 'employee_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'employee_Type')->dropDownList([ 'Admin' => 'Admin' ]) ?>


    <?= $form->field($model, 'JopTitle')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Hosp_id')->dropDownList(ArrayHelper::map(hospital::find()->all(), 'Hosp_id', 'Hosp_name')) ?>

    <?= $form->field($model, 'Status')->dropDownList([ 'Enabled' => 'Enabled', 'Disabled' => 'Disabled', ], ['prompt' => '']) ?>

	
	<?= $form->field($model1, 'Username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model1, 'Password')->textInput() ?>

    <?= $form->field($model1, 'Role_Id')?>

    <?= $form->field($model1, 'Category')?>
	
	<?= $form->field($model1, 'email')->textInput() ?>

    <?= $form->field($model1, 'Description')->textInput() ?>

    <?= $form->field($model1, 'Status')->dropDownList([ 'Enabled' => 'Enabled', 'Disabled' => 'Disabled', ], ['prompt' => '']) ?>

   <?= $form->field($model1, 'reset_token')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
