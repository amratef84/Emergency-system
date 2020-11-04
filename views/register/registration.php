<?php
 use yii\bootstrap\ActiveForm;
   use yii\bootstrap\Html;
   use yii\jui\DatePicker;
use yii\widgets\DetailView;
use yii\grid\GridView;
use app\models\LoginForm;
use yii\grid\CheckBoxColumn;
use yii\helpers\ArrayHelper;
use yii\data\ActiveDataProvider;
use app\models\DiseaseDictionary;
use app\models\MedicalHistory;
use app\models\RegistrationForm;
use app\models\HospitalEmployee;
use yii\bootstrap\ActiveField;
$this->title = 'Registration Form';
$this->params['breadcrumbs'][] =$this->title;
?>
  <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBIjw1JtRfZ1g9mLmEQdEj8A-4NGVE6PJU&callback=initAutocomplete&libraries=places&v=weekly"
      defer
    ></script>
    <style type="text/css">
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 65%;
      }

      /* Optional: Makes the sample page fill the window. */
      html,
      body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #description {
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
      }
      #infowindow-content .title {
        font-weight: bold;
      }

      #infowindow-content {
        display: none;
      }

      #map #infowindow-content {
        display: inline;
      }

      .pac-card {
       margin: 10px 10px 0 0;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        background-color: #fff;
        font-family: Roboto;
      }

      #pac-container {
        padding-bottom: 12px;
        margin-right: 12px;
      }

      .pac-controls {
        display: inline-block;
        padding: 5px 11px;
      }

      .pac-controls label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }

      #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: -20px;
        padding: 0 10px 0 10px;
        text-overflow: ellipsis;
        color: #000;
        width: 125%;
    }

     #pac-input:focus {
        border-color: #4d90fe;
      }

      #title {
        color: #fff;
        background-color: #4d90fe;
        font-size: 25px;
        font-weight: 500;
        padding: 6px 12px;
      }

      #target {
        width: 100px;
      }
    </style>
  <body>
 <?php
    $form = ActiveForm::begin([
                 'id' => 'registration-form','class'=>'form']); ?>  
<div class = "row">
   <div class = "col-md-4"></div>
   <div class = "col-md-4">

      <h2><strong>Register</strong></h2>
             

      <?php // $form = ActiveForm::begin(['id' => 'registration-form']); ?>
            <!--  <b>ID</b>
			 <br></br> -->
	

  <?= $form->field($model, 'Patient_Id')->textInput(['maxlength' => true,'value'=>RegistrationForm::PatientCount(),'readonly'=>'true']) ?>
	 <?= $form->field($model, 'Patient_FName')?>
	  <?= $form->field($model, 'Patient_LName') ?>
	  <?= $form->field($model, 'Patient_NId') ?>
	  <?= $form->field($model, 'Patient_MPhone') ?>
	  <?= $form->field($model, 'Patient_Address') ?>
	  <?= $form->field($model, 'Patient_Email') ?>
	  <?= $form->field($model, 'Patient_location')->hiddenInput(['id'=>'location'])->label(false) ?>
	  <?= $form->field($model, 'DateofBirth')->input('date')?>
      <?= $form->field($model, 'Patient_Gender') ->dropdownlist($model->getGender())?>
	   <?= $form->field($model, 'Registration_Date')->input('date')?>
	<?= $form->field($model, 'Account_Status')->dropdownlist($model->getStatus()) ?>
    	<?= $form->field($model, 'Account_Type')->dropdownlist($model->getAType()) ?>

<!--     <input
      id="pac-input"
      class="controls"
      type="text"
      placeholder="Search"
    /> -->
 
    <div id="map">
 
     <?php
 //$form = ActiveForm::begin(); ?> 
    </div>

  
        

	 
	<hr>
	 <h4><strong>Midecal History</strong></h4>
	<div class="viaggio" class = "">
  <?php

	 $dataProvider = new ActiveDataProvider([
	  
    'query' => DiseaseDictionary::find(),
    
	
]);
 echo GridView::widget([
 
    'dataProvider' => $dataProvider,
	
	'columns'=>[
	  	 [
            'class' => 'yii\grid\DataColumn',
             'attribute'=>'#',	
                 'visible'=>false,			 
            'value' => function ($data) {
                return $data->Disease_Id; 
            },
        ],
		
	  [
            'class' => 'yii\grid\DataColumn',
             'attribute'=>'Disease',			
            'value' => function ($data) {
                return $data->Disease_Name; 
            },
        ],
		
		  [
            //['class' => 'yii\grid\DataColumn'],
             'attribute'=>'Since',	
              'format'=>'raw',	              
            'value' => function($data){
			 return Html::textinput('Disease_Since'.$data->Disease_Id,'',['placeholder'=>'yyyy-mm-dd','name'=>'date']); },			
			
        ], 
	 ['class' => 'yii\grid\CheckboxColumn','header'=>'Exist','name'=> 'checked'],
	
	],
	
]);
	 ?>
    <?php ActiveForm::end(); ?>
      <div class = "form-group">
         <?= Html::submitButton('Register', ['class' => 'btn btn-primary','name' => 'registration-button'])
      // Html::a('Registration', ['class' => 'btn btn-primary','name' => 'registration-button'])
             ?>
      </div>
     
      </div>
</div>
   <div class = "col-md-4"></div>
   
 </div>
</body>

    <script>
      "use strict";
	   function initAutocomplete() {
        const map = new google.maps.Map(document.getElementById("map"), {
          center: {
            lat: -33.8688,
            lng: 151.2195
          },
          zoom: 13,
          mapTypeId: "roadmap"
        }); // Create the search box and link it to the UI element.

        const input = document.getElementById("pac-input");
        const searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input); // Bias the SearchBox results towards current map's viewport.

        map.addListener("bounds_changed", () => {
          searchBox.setBounds(map.getBounds());
        });
        let markers = []; // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.

        searchBox.addListener("places_changed", () => {
          const places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          } // Clear out the old markers.
		  
        
          markers.forEach(marker => {
            marker.setMap(null);
          });
          markers = []; // For each place, get the icon, name and location.

          const bounds = new google.maps.LatLngBounds();
          places.forEach(place => {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }

            const icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            }; // Create a marker for each place.

            markers.push(
              new google.maps.Marker({
                map,
                icon,
                title: place.name,
                position: place.geometry.location
              })
            );

            if (place.geometry.viewport) {
				  
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
			  $("#location").val(bounds);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          map.fitBounds(bounds);
        });
      }
    </script>
     

