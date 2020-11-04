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
    <h1 style="font-size:350%; text-align:center; color:black; font-family:Andale Mono, monospace;">Welcome to The Emergency Department Employees System</h1>
    <style>
     body {
       text-align: center;
       font-family:Andale Mono, monospace;
          /* height: 124%;*/
    /*background-image: url(../web/images/banner1.jpg);*/
  /* background-image: url(../../../web/images/hospital-s.jpg);*/
   position: relative;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
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
       border: 1px solid lightblue;
       font-size: 20px;
       font-weight: bold;
       border-radius: 10px;
       box-shadow: 3px 3px 3px 0px #b7b7b7;
       color:black;
       position: inherit;
     }

     .btn-group:hover {
       color: red;
     }
   /* background-image: url(../../web/images/banner1.jpg);*/
   /* position: relative;*/
   /* background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;*/
     
     
    </style>
  </head>
  <br>
  <body>


    <div class="btn-group" >
       <?= Html::img('@web/images/register.png', ['class' => 'img', 'alt'=>'register Image', 'height'=>'80px', 'width'=>'90px' ]) ?>
<br>
   <?=Html::a('Register Patients',['/register/create'])?>   
    </div>
      
   <!--  <div class="btn-group" > -->
  
    <?php 
    // Html::img('@web/images/transfer.png', ['class' => 'img', 'alt'=>'transfer Image', 'height'=>'70px', 'width'=>'80px' ]) 
    ?>
      <!--  <br> -->
      <?php
       //=Html::a('Transfer Patients',['/employee/transfer_patients'])
      ?>
     <!-- </div> -->
        
     <div class="btn-group">
         
    <?= Html::img('@web/images/request-service.png', ['class' => 'img', 'alt'=>'User Image', 'height'=>'70px', 'width'=>'80px' ]) ?>
<br>
    <?=Html::a('Current Requests',['/patient-request/index'])?>
    </div>
    
    <div class="btn-group" >

    <?= Html::img('@web/images/request.png', ['class' => 'img', 'alt'=>'User Image', 'height'=>'70px', 'width'=>'80px' ]) ?>
<br>
      <?=Html::a('Make a request',['/patient/index'])?>
      
    </div>
      
      
    <div class="btn-group" >
    <?= Html::img('@web/images/unit.png', ['class' => 'img', 'alt'=>'patientsview Image', 'height'=>'70px', 'width'=>'90px' ]) ?>
<br>
    <?=Html::a('View units',['unitt/index'])?> 
             </div>
			 
			  <div class="btn-group" >
    <?= Html::img('@web/images/viewPaitent.png', ['class' => 'img', 'alt'=>'patientsinfo User Image', 'height'=>'70px', 'width'=>'80px' ]) ?>
<br>
    <?=Html::a('View patients',['/employee/view'])?> 
             </div>

    
  </body>
