<?php
use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'eTrige System';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- <h3 style="text-align:center; color:black; font-family:Andale Mono, monospace;">COVID-19 eTriage Syatem</h3> -->
          <br>   <br>  <br>
    <h1 style="font-size:350%; text-align:center; color:black; font-family:Andale Mono, monospace;">HOSPITAL ADMIN</h1>
    <style>
     body {
       text-align: center;
       font-family:Andale Mono, monospace;
       height: 105%;
    /*background-image: url(../web/images/banner1.jpg);*/
  /* background-image: url(../../../web/images/hospital002.jpg);*/
   position: relative;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
     }
     
     .btn-group{
         
       margin-top: 6vh;
       text-align: center;
       margin-bottom: 8vh;
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
     }

     .btn-group:hover {
       color: red;
     }

     
     
    </style>
  </head>
  <br>
  <body>


    <div class="btn-group" >
       <?= Html::img('@web/images/unit.png', ['class' => 'img', 'alt'=>'User Image', 'height'=>'60px', 'width'=>'80px' ]) ?>
<br>
   <?=Html::a('Setting Units',['/unit'])?>   
    </div>
      
    <div class="btn-group" >
  
    <?= Html::img('@web/images/employee.png', ['class' => 'img', 'alt'=>'User Image', 'height'=>'70px', 'width'=>'80px' ]) ?>
<br>
      <?=Html::a('Setting hospital-employee',['/user'])?>
     </div>
        
     
     

    
  </body>
