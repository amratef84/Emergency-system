<?php

use yii\helpers\Html;

$this->title = 'Setting Parameters';
$this->params['breadcrumbs'][] = $this->title;

?>

<!DOCTYPE html>
<html lang="en">
  <head>
  <!--  <h3 style="text-align:center; color:black; font-family:Andale Mono, monospace;">COVID-19 eTriage Syatem</h3> -->
                <br>   <br>

    <h1 style="font-size:350%; text-align:center; color:black; font-family:Andale Mono, monospace;">SETTING PARAMETERS</h1>
    <style>
     body {
       text-align: center;
       font-family:Andale Mono, monospace;
     }
     
     .btn-group{
       margin-top: 2vh;
       text-align: center;
       margin-bottom: 5vh;
       cursor: pointer;
       display:inline-block;
           width: 300px;
         height: 150px;
         padding: 15px;
       min-width: 17vw;
       background-color: #ffffffc2;
       padding: 26px;
       border: 1px solid #d2d2d2;
       font-size: 20px;
       font-weight: bold;
       border-radius: 10px;
       box-shadow: 3px 3px 3px 0px #b7b7b7;
       color:black;
     }

     .dashboard-images{
       width: 85px;
       height: 85px;
     }
     .btn-group:hover {
       color: red;
     }
     
    </style>
  </head>
  <body>
          <br> 

    <div class="btn-group"> <?= Html::img('@web/images/Add_category.png', ['class' => 'img', 'alt'=>'User Image', 'height'=>'70px', 'width'=>'80px' ]) ?>
        <br> <?=Html::a('Setting Category',['/category'])?></div>
  
    <div class="btn-group"> <?= Html::img('@web/images/x-07-512.png', ['class' => 'img', 'alt'=>'User Image', 'height'=>'70px', 'width'=>'80px' ]) ?>
<br>
        <?=Html::a('Setting Symptoms',['/symptoms'])?> </div>
      
    <div class="btn-group"> <?= Html::img('@web/images/images.png', ['class' => 'img', 'alt'=>'User Image', 'height'=>'70px', 'width'=>'80px' ]) ?>
  <br>
        <?=Html::a('Symptoms Groups',['/symptoms-group'])?> </div> 

        
    <div class="btn-group"> <?= Html::img('@web/images/request-service.png', ['class' => 'img', 'alt'=>'User Image', 'height'=>'70px', 'width'=>'80px' ]) ?>
  <br>
        <?=Html::a('System Parameters',['/systemparameters'])?> </div> 
    

  </body>
