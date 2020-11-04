<?php
use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'eTrige System';
?>

<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- <h3 style="text-align:center; color:black; font-family:Andale Mono, monospace;">COVID-19 eTriage Syatem</h3> -->
          <br>   <br>  
    <h1 style="font-size:350%; text-align:center; color:black; font-family:Andale Mono, monospace;">SYSTEM ADMIN</h1>
    <style>
     body {

       text-align: center;
       font-family:Andale Mono, monospace;
    height: 124%;
    /*background-image: url(../web/images/banner1.jpg);*/
  /* background-image: url(../../../web/images/doctordesk.jpg);*/
   position: relative;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
     }
     
     .btn-group{
         
       margin-top: 1vh;
       text-align: center;
       margin-bottom: 5vh;
       cursor: pointer;
       display:inline-block;
           width: 300px;
         height: 150px;
         padding: 15px;
       min-width: 17vw;
       background-color: #ffffffc2;
       font-size: 20px;
       font-weight: bold;
       border-radius: 5px;
       box-shadow: 3px 3px 3px 0px #b7b7b7;
       color:black;
     }

     .btn-group:hover {
       color: red;
     }
/*     .btn-group.btn_green{
      background-color:#00c0ef;
     }

     .btn-group a {
      color:#fff;
     }

     .btn-group.btn_info{
      background-color:#dc3545;
     }
     .btn-group.btn_red{
      background-color:#fff;
      border-top: solid 1px #cecece;
      border-left: solid 1px #cecece;
     }
     .btn-group.btn_red a {
      color:#000;
     }
     .btn-group.btn_yellow{
      background-color:#17a2b8;
     }
     .btn-group.btn_blue{
      background-color:#f39c12;
     }*/
     
    </style>
  </head>
  <br>
  <body>


    <div class="btn-group btn_green" >
       <?= Html::img('@web/images/670875.png', ['class' => 'img', 'alt'=>'User Image', 'height'=>'60px', 'width'=>'80px' ]) ?>
<br>
   <?=Html::a('Statistics Parameters',['/static-parameters'])?>   
    </div>
      
    <div class="btn-group btn_info" >
  
    <?= Html::img('@web/images/Parameters-512.png', ['class' => 'img', 'alt'=>'User Image', 'height'=>'70px', 'width'=>'80px' ]) ?>
<br>
      <?=Html::a('Setting Parameters',['/site/settingparameter'])?>
     </div>
        
     <div class="btn-group btn_red">
         
    <?= Html::img('@web/images/hospital-building.jpg', ['class' => 'img', 'alt'=>'User Image', 'height'=>'70px', 'width'=>'80px' ]) ?>
<br>
    <?=Html::a('View Hospital',['/hospitall'])?>
    </div>
    
    <div class="btn-group btn_yellow" >

    <?= Html::img('@web/images/request-service.png', ['class' => 'img', 'alt'=>'User Image', 'height'=>'70px', 'width'=>'80px' ]) ?>
<br>
      <?=Html::a('System List',['/system-list'])?>
      
    </div>
      
      
    <div class="btn-group btn_blue" >
    <?= Html::img('@web/images/find_patients-512.png', ['class' => 'img', 'alt'=>'User Image', 'height'=>'70px', 'width'=>'80px' ]) ?>
<br>
    <?=Html::a('Add User',['/user'])?> 
             </div>

   <div class="btn-group" >
  
    <?= Html::img('@web/images/request.png', ['class' => 'img', 'alt'=>'User Image', 'height'=>'70px', 'width'=>'80px' ]) ?>
<br>
      <?=Html::a('Setting Sensor_with_Symptoms',['/symsen'])?>
     </div>

    
  </body>
