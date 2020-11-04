<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\HospitalEmployeeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'STATIC PARAMETERS';
$this->params['breadcrumbs'][] = $this->title;
?>

<!DOCTYPE html>




<html lang="en">
  <head>
    <br><br>
    <h3 style="text-align:center; color:black; font-family:Andale Mono, monospace;">COVID-19 eTriage Syatem</h3>
    <h1 style="font-size:350%; text-align:center; color:black; font-family:Andale Mono, monospace;">STATIC PARAMETERS</h1>
  </head>
  <style>

   body {
     text-align: center;
     font-family: Arial, Helvetica, sans-serif !important;

   }


   .btn-group{
     margin-top: 2vh;
     text-align: center;
     cursor: pointer;
     display: inline-block;
     min-width: 10vw;
     min-height: 6vw;
     background-color: white;
     border: solid 1px #cecece;
     padding: 22px;
     margin: 8px;
     font-size: 18px;
     font-weight: bold;
     border-radius: 5px;
     box-shadow: 3px 3px 3px 0px #b7b7b7;
     text-decoration: none;
     color:black;
     width: 220px;
   }


  </style>
  <body>



    <div class="container-fluid">
      <div id="page-wrapper">
        <div class="btn-group"  aria-label="labels" style="background-color:  #e83e8c ;" >
          <div class="row">
            <div>Hospitals</div>

              <?php echo $hospitalsCount; ?>
              <hr>
            </div>
          </div>
        <div class="btn-group"  aria-label="labels" style="background-color:  #3d9970 ;">
          <div class="row">
            <div>Units</div>
              <?php echo $unitsCount; ?>
              <hr>
          </div>
        </div>
         
            <div class="btn-group"  aria-label="labels" style="background-color:  #cecece ;" >
              <div class="row">
                <div>total number Patients</div>
                  <hr>
                  <?php echo $patientsCount; ?>
              </div>
            </div>
             <div class="row">
            <div class="btn-group"  aria-label="labels" style="background-color:  #F0411E ;" >
              <div class="row">
                <div>Positive Patients</div>

                  <hr>
                  <?php echo $positiveCasesCount; ?>
                 </div></div>
            <div class="btn-group"  aria-label="labels" style="background-color: #FFA02E  ;" >
              <div class="row">
                <div>Suspected Patients</div>

                  <hr>
                  <?php echo $suspectedCasesCount; ?>

              </div> </div>
              <div class="btn-group"  aria-label="labels" style="background-color: #385FCF;" >
                <div class="row">
                  <div>Negative Cases</div>

                    <hr>
                  <?php echo $negativeCasesCount; ?>

                </div>
              </div>


               <div class="btn-group"  aria-label="labels" style="background-color: #50AB50  ;" >
              <div class="row">
                <div>Recovered Patients</div>

                  <hr>
                  <?php echo $recoveredCasesCount; ?>

              </div> </div>

          </div>
      </div>
    </div>
    </div>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
     google.charts.load('current', {'packages':['corechart']});
     google.charts.setOnLoadCallback(drawChart);
     function drawChart() {
       var data = google.visualization.arrayToDataTable([
         ['P ', 'T '],
         ['Negative Cases',     <?php echo $negativeCasesCount; ?>],
         ['Positive Patients',  <?php echo $positiveCasesCount; ?>],
         ['Suspected Patients', <?php echo $suspectedCasesCount; ?>],
         ['Recovered Patients', <?php echo $recoveredCasesCount; ?>],

       ]);
       var options = {
         title: 'COVID-19 CASES'
       };
       var chart = new google.visualization.PieChart(document.getElementById('piechart'));
       chart.draw(data, options);
     }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
</html>



