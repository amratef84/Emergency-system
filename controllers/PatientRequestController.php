<?php

namespace app\controllers;

use Yii;
use app\models\PatientRequest;
use app\models\RequestResponse;
use app\models\Symptoms;
use app\models\SymptomsGroup;
use app\models\Patient;
use app\models\MedicalHistory;
use app\models\Sensor;
use app\models\PatientRequestSearch;
use app\models\RegisteredPatientAccount;
use app\models\PatientMedicalHistory;
use app\models\HospitalSession;
use app\models\HospitalScreening;
use app\models\DiseaseDictionary;
use app\models\PatientSensorsData;
use app\models\Category;
use app\models\CovidCatagory;
use app\models\PatientScreening;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\MonitorSensorsData;
use app\models\Symsen;
/**
 * PatientRequestController implements the CRUD actions for PatientRequest model.
 */
class PatientRequestController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                /*'actions' => [
                    'delete' => ['POST'],
                ],*/
            ],
        ];
    }

    /**
     * Lists all PatientRequest models.
     * @return mixed
     */
    
    public function actionSend($id,$req_id) 
    {     
        /*return $this->render('vr', [
            'model' => $this->findModel($id),
        ]);*/
        $model = RegisteredPatientAccount::findOne($id);
        if($model == null){
               Yii::$app->session->setFlash('error',Yii::t('app', 'Patient does not have Registered'));
                    return $this->redirect(['/patient-request/index']);
        }

        $modelreq = PatientRequest::findOne($req_id);
        if($modelreq == null){
               Yii::$app->session->setFlash('error',Yii::t('app', 'Patient does not have PatientRequest'));
                    return $this->redirect(['/patient-request/index']);
           }


		 $req = PatientRequest::find()->where('Patient_Id = :ti', [':ti' =>$model->Patient_Id])->andwhere('Request_Id = :ri',[':ri'=>$modelreq->Request_Id])->one();

        if($req == null){
               Yii::$app->session->setFlash('error',Yii::t('app', 'Patient does not have PatientRequest'));
                    return $this->redirect(['/patient-request/index']);
           }


		 $sp=(new\yii\db\Query())->select(['Request_status'])->from('patient_request')->FilterWhere(['=','Request_Id',$req->Request_Id])->one();
			if($sp == null){
               Yii::$app->session->setFlash('error',Yii::t('app', 'Patient does not have PatientRequest'));
                    return $this->redirect(['/patient-request/index']);
           }


		$modelr = PatientRequest::find()->FilterWhere(['=','Request_Id',$req->Request_Id]);
			if($modelr == null){
               Yii::$app->session->setFlash('error',Yii::t('app', 'Patient does not have PatientRequest'));
                    return $this->redirect(['/patient-request/index']);
           }

		//$modelr = PatientRequest::findOne($rid);
		  $birthDate = Patient::findOne($modelr->one()->Patient_Id)->DateofBirth;

          if($birthDate == null){
               Yii::$app->session->setFlash('error',Yii::t('app', 'Patient does not have birthDate'));
                    return $this->redirect(['/patient-request/index']);
           }
          else{ 
               //calulate patient age
                $birthDate = explode("-", $birthDate);
                $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[2], $birthDate[1], $birthDate[0]))) > date("md")
                ? ((date("Y") - $birthDate[0]) - 1)
                : (date("Y") - $birthDate[0]));
            }

          $model2 = PatientMedicalHistory::find()->where('Patient_Id = :ti', [':ti' =>$model->Patient_Id])->all();         
         /*if($model2 == null){
               Yii::$app->session->setFlash('error',Yii::t('app', 'Patient does not have PatientMedicalHistory'));
                    return $this->redirect(['/patient-request/index']);
           }*/
		  $res=RequestResponse::find()->where('Request_Id = :ti', [':ti' =>$req->Request_Id])->one();
		  if($res == null){
               Yii::$app->session->setFlash('error',Yii::t('app', 'Patient does not have RequestResponse'));
                    return $this->redirect(['/patient-request/index']);
           }

		  $sensors = PatientSensorsData::find()->where('Request_Id = :ti', [':ti' =>$req->Request_Id])->all();
		  if($sensors == null){
               Yii::$app->session->setFlash('error',Yii::t('app', 'Patient does not have RequestResponse'));
                    return $this->redirect(['/patient-request/index']);
           }

		  $es = $req->Estimated_score;
		  $req_id=$req->Request_Id;
		   
          $date = explode(" ", $req->RequestTime)[0];
          $t = explode(" ", $req->RequestTime)[1];
          $time = explode(".", $t)[0];

		  $blood=(new\yii\db\Query())->select(['Value'])->from('patient_sensors_data')->Where('Request_Id =',$req->Request_Id)->andwhere('SensorID = 1');
           $heart = (new\yii\db\Query())->select(['Value'])->from('patient_sensors_data')->Where('Request_Id =',$req->Request_Id)->andwhere('SensorID = 2');
            $temp = (new\yii\db\Query())->select(['Value'])->from('patient_sensors_data')->Where('Request_Id =',$req->Request_Id)->andwhere('SensorID = 3');
            $spo = (new\yii\db\Query())->select(['Value'])->from('patient_sensors_data')->Where('Request_Id =',$req->Request_Id)->andwhere('SensorID = 4');
            $model3 = HospitalSession::find()->where('Request_Id = :ti', [':ti' =>$req->Request_Id])->one();
				/*if($model3 == null){
             	  Yii::$app->session->setFlash('error',Yii::t('app', 'Patient does not have HospitalSession'));
                    return $this->redirect(['/patient-request/index']);
        	   }*/
			if($req->Estimated_Level==0){
				
				$cn="no category found";
				
			}
			else{
			
			$cn = Category::findOne($req->Estimated_Level)->Cat_name;
			
			}
			if($req->Estimated_COVID==0){				
				$covid_id=3;
				$cc="no covid category found";
			}
			else{		
			$covid_id=$req->Estimated_COVID;
			$cc = CovidCatagory::findOne($req->Estimated_COVID)->Case_Name;
			}
			
      	   $model4=RequestResponse::find()->where('Request_Id = :ti', [':ti' =>$req->Request_Id])->one();
      	   if($model4 == null){
               Yii::$app->session->setFlash('error',Yii::t('app', 'Patient does not have RequestResponse'));
                    return $this->redirect(['/patient-request/index']);
           }
            //$model4 = HospitalSession::find()->where('Request_Id = :ti', [':ti' =>$req->Request_Id])->one();
            $model5 = PatientScreening::find()->where('Request_Id = :ti', [':ti' =>$req->Request_Id])->all();

            if($model5 == null){
               Yii::$app->session->setFlash('error',Yii::t('app', 'Patient does not have PatientScreening'));
                    return $this->redirect(['/patient-request/index']);
           }
			//$current_status = $model4->patient_status;
			
        //$current_unit = $model4->Unit_id;
        //$current_reason = $model4->reason;
		//$sid=$model4->Session_ID;
		$user=Yii::$app->user->identity->User_ID;
		$idu =(new\yii\db\Query())->select(['Hosp_id'])->from('hospital_employee')->FilterWhere(['=','User_ID',$user]);
			$Eid=(new\yii\db\Query())->select(['employee_ID'])->from('hospital_employee')->FilterWhere(['=','User_ID',$user]);			
        /*
        if ($model2->load(Yii::$app->request->post()) && $model2->validate()) {
            if($model2->save()){
            Yii::$app->session->setFlash('success',Yii::t('app', 'The information has been updated'));
                    return $this->redirect(['/patient-request/index']);
            }
        }*/
         /*     
        if ($model3->load(Yii::$app->request->post())) {
            $post = Yii::$app->request->post('HospitalSession');
            if(isset($post['advices'])){
            if($model3->save(false)){
            Yii::$app->session->setFlash('success',Yii::t('app', 'The advice has been updated'));
                    return $this->redirect(['/patient-request/index']);
            }
            }
        }
            
        if ($model4->load(Yii::$app->request->post())) {
            if($model4->save(false)){
            $model->unit_id = $model4->Unit_id;  
            $model->save(false);
                
            Yii::$app->session->setFlash('success',Yii::t('app', 'The result has been updated'));
                    return $this->redirect(['/patient-request/index']);
            }}*/
			$mh=MedicalHistory::find()->FilterWhere(['=','Patient_Id',$req->Patient_Id]);
			 
			// $dis=DiseaseDictionary::find();
             $symptomsData =  Symptoms::find()->FilterWhere(['!=','Target','only-patient'])->orderBy(['Symp_Group'=>SORT_ASC]);
		            // $sensorData = PatientSensorsData::find()->FilterWhere(['=','Request_Id',$req->Request_Id]);

              if(isset($_POST['get_update'])){  
               /*echo "aaaaaaaaa";*/

                      $datepationt = PatientSensorsData::find()->where('Request_Id = :ri',[':ri'=>$req->Request_Id])->all();//andWhere('SensorID = :se',[':se'=>$sd->SensorID])->one(); 
                       $symsenData= Symsen::find()->all(); 

                       foreach($symsenData as $sd){
                        /*echo $sd->Sen_ID;*/
                          foreach($datepationt as $dm){                  
                       if($sd->Sen_ID  == $dm->SensorID && $dm->Value > $sd->Rang_Min && $dm->Value < $sd->Rang_Max)
                       {
                       $ps =  PatientScreening::find()->where('Request_Id = :ri',[':ri'=>$req->Request_Id])->andWhere('Symp_ID = :si',[':si'=>$sd->Sym_ID])->one();
                                                     
                        $ps->Value = "Y";
                        $ps->ByDone="Sensor-based";
                         
                        $ps->save(false); 
                        
                          } 
                        }
                      }
                      Yii::$app->session->setFlash('success','updated successfully');

              }//get_update
         	 if(isset($_POST['save'])){   
              
                  //save Symptoms values
                              foreach($symptomsData->all() as $sd){
                             $value =Yii::$app->request->post('sym_value'.$sd->Symp_ID); 
                             $ps = PatientScreening::find()->where('Request_Id = :ri',[':ri'=>$req->Request_Id])->andWhere('Symp_ID = :si',[':si'=>$sd->Symp_ID])->one();
                             if($value == "1"){
                               /*if($ps->ByDone==null)
                                 {
                                 $ps->ByDone=null; 
                                 }*/
                              $ps->Value = "Y";
                              $ps->SensorResult = "Y";
                              $ps->save(false); 
                             }else{   
                              $ps->Value = "N";
                              $ps->ByDone="   ";
                              $ps->SensorResult = "N";
                              $ps->save(false);     
                             }
                                 
                            }
              
               /*
                Algorithm 1
                */

                //check if adult
                if($age >= 18){
                $sql = 'SELECT *, S.Adultscore as Score
                FROM patient_screening p 
                JOIN symptoms S ON p.Symp_ID = S.Symp_ID
                JOIN symptomsgroups G ON G.Group_ID = S.Symp_Group
	              Where p.Request_id= :ri
	              ORDER BY S.Symp_Group';   
                }
                else{
                $sql = 'SELECT *, S.Pediatric_score as Score
                FROM patient_screening p 
                JOIN symptoms S ON p.Symp_ID = S.Symp_ID
                JOIN symptomsgroups G ON G.Group_ID = S.Symp_Group
	              Where p.Request_id= :ri
	              ORDER BY S.Symp_Group';     
                }
              
               //Calculate Total score
                $con = Yii::$app->getDb();
		            $command =
                $con->createCommand($sql); 
                $command->bindValue(':ri',$req->Request_Id);
                $result = $command->queryAll(); 
                $Score_group=0; 
                $Score_ind=0; 
                $Skip=-1;
                foreach($result as $row){
                    
                if($row['ScoringType'] == "Group" && $row['Value']== "Y" && $Skip != $row['Group_ID'] 
                  )
                {
                   $Score_group = $Score_group + $row['Score'] ;
                   $Skip= $row['Group_ID'];   
                    
                }
                    
                if($row['ScoringType'] == "individual" && 
                   $row['Value']== "Y" )
                {
                   $Score_ind = $Score_ind + $row['Score'] ;        
                }
               }
              
               $TotalScore = $Score_group + $Score_ind;
                /*
                End Algorithm 1
                */
              
                /*f
                Algorithm 2
                */
                $Estimated_Catagory_id=null;
                $Estimated_Catagory_name=null;
                $category_list = Category::find()->all();
                 foreach($category_list as $ct){
                    
                if($TotalScore >= $ct->Thresh_min 
                   && $TotalScore <= $ct->Thresh_max )
                {
                   $Estimated_Catagory_id = $ct->Cat_ID ;
                   $Estimated_Catagory_name = $ct->Cat_name ; 
                    break;
                }
                 }
                 /*
                End Algorithm 2
                */
               /*
                Algorithm 3
                */
                $Estimated_Case_id=null;
                $Estimated_Case_name=null;
                $covid_category_list = CovidCatagory::find()->all();
                 foreach($covid_category_list as $ct){
                    
                if($TotalScore >= $ct->Thresh_min 
                   && $TotalScore <= $ct->Thresh_max )
                {
                   $Estimated_Case_id = $ct->Case_ID ;
                   $Estimated_Case_name = $ct->Case_Name; 
                    break;
                }
               }

                 /*
                End Algorithm 3
                */
                /*
                check result and update patient request
                */
              
                if( $Estimated_Catagory_id == null){
                   $Estimated_Catagory_name =0;
                }
              
                if( $Estimated_Case_id == null){
                   $Estimated_Case_name =0;
                } 
                //$req = PatientRequest::findOne($request_id);
                $req->Estimated_score = $TotalScore;
                $req->Estimated_Level = $Estimated_Catagory_id;
                $req->Estimated_COVID = $Estimated_Case_id;
				//request state
				$m = Yii::$app->db->createCommand('SELECT SP_value FROM systemparameters')->queryScalar();
				$item1='response_v1';
				$item2='response_v2';
				 $v1 =(new\yii\db\Query())->select(['SP_value'])->from('systemparameters')->Where(['SP_item'=>$item1])->scalar();
				 $v2 =(new\yii\db\Query())->select(['SP_value'])->from('systemparameters')->Where(['SP_item'=>$item2])->scalar();
				if($TotalScore >= $v1)
				{
					$req->Request_Status='autoAllowable';
					$req->save(false);
				}
				else 
				{if($TotalScore <= $v2){
					$req->Request_Status='autoReject';
					$req->save(false);
				}
				else{
					$req->Request_Status='autoPending';
					$req->save(false);
				}}
                
				  //create response
				 $res->Request_Id=$req->Request_Id;
				 $res->caluculated_score=$TotalScore;
				 $res->estimated_category=$Estimated_Catagory_name;
				 date_default_timezone_set("Asia/Riyadh");
                 $res->responseTime=date('Y-m-d H:m:s');
				 /*$res->advaices='default';*/
				 $res->responseType='auto';
				 $res->delvirey_state='Y';
				 $res->save(false);
              
    			$new=new RequestResponse();
    			$new->Request_Id=$req->Request_Id;
				  $new->caluculated_score=$es;
				  
				 $new->estimated_category=$res->estimated_category;
				 $ad=$_POST['advice4'];
				 $new->advaices=$ad;
				 date_default_timezone_set("Asia/Riyadh");
				 $new->responseTime=date('y-m-d h:m:s');
				 
				 $new->delvirey_state='Y';
				 $note=$_POST['nr'];
				 $new->Notes=$note;
				 $new->save(false);
				 
				 Yii::$app->session->setFlash('success','updated successfully');
				 return $this->refresh();
				 
			
	       	}
		
       if(isset($_POST['Reject'])){				  
				 
				 $req->Request_Status='Rejected';
				 $req->save(false);
				 $new=new RequestResponse();
				 $new->Request_Id=$req->Request_Id;
				 $new->caluculated_score=$es;
				 $new->respond_state='Rejected';
				  $cat=$_POST['cat'];
				 //$category = Category::findOne($cat)->Cat_name;
				 $new->estimated_category=$cat;
				/* $ad=$_POST['advaices'];
				 $new->advaices=$ad;*/
				  date_default_timezone_set("Asia/Riyadh");
				 $new->responseTime=date('y-m-d h:m:s');
				 $new->responseType='hospital';
				 $new->delvirey_state='Y';
				 $note=$_POST['reason'];
				 $new->Notes=$note;
				 $new->save(false);
				 return $this->redirect(['/patient-request/index']);
				 }
			
			 
			  if(isset($_POST['Check'])){
				    
				$max = Yii::$app->db->createCommand('SELECT max(Session_ID) as max FROM hospital_session')->queryScalar(); 
				$teck=Yii::$app->db->createCommand('SELECT max(Ticket_ID) as max FROM hospital_session')->queryScalar();
				  $req->Request_Status='Admitted';
				 $req->save(false);
			    $max =$max+1;
			     $user=Yii::$app->user->identity->User_ID;
				 
				 $modelcreat=new HospitalSession();
				 $modelcreat->load(Yii::$app->request->post());
				 $modelcreat->Session_ID=$max;
				 $modelcreat->Request_Id=$req->Request_Id;
				 $modelcreat->Ticket_ID=$teck+1;
				 $cat=$_POST['cat'];
				 $name=(new\yii\db\Query())->select(['Cat_ID'])->from('category')->FilterWhere(['=','Cat_name',$cat]);
				 

				 $modelcreat->Cat_ID=$name;
				 $modelcreat->patient_status='unstable';
				 $modelcreat->Hosp_decision=11;
				 //$unit=$_POST['Flu'];
				 //$u=(new\yii\db\Query())->select(['Unit_id'])->from('unit')->FilterWhere(['=','default_unit',3]);
				 $modelcreat->Unit_id=3;
				 $modelcreat->Covid_status=$covid_id;
				 $Eid=(new\yii\db\Query())->select(['employee_ID'])->from('hospital_employee')->FilterWhere(['=','User_ID',$user]);
				 $modelcreat->employee_ID=$Eid;
				 $modelcreat->advices=$_POST['advices'];
				 $modelcreat->calculated_Score=$es;
				 $rse=$_POST['reason'];
				  $modelcreat->Session_status='Pending';
				  date_default_timezone_set("Asia/Riyadh");
				  $modelcreat->Date=date('y-m-d');
				  $modelcreat->Hosp_id=$idu;
				  $modelcreat->reason=$rse;
				  $modelcreat->save(false);
				  
				   $new=new RequestResponse();
				 $new->Request_Id=$req->Request_Id;
				 $new->caluculated_score=$es;
				 $new->respond_state='Admitted';
				  $cat=$_POST['cat'];
                  //$category = Category::findOne($cat)->Cat_name;
				  
				 $new->estimated_category=$cat;
				 /*$ad=$_POST['advaices'];
				 $new->advaices=$ad;*/
				  date_default_timezone_set("Asia/Riyadh");
				 $new->responseTime=date('y-m-d h:m:s');
				  $new->responseType='hospital';
				 $new->delvirey_state='Y';
				 $note=$_POST['reason'];
				 $new->Notes=$note;
				 $new->save(false);


                 $maxSession = Yii::$app->db->createCommand('SELECT max(Session_ID) as max FROM hospital_session')->queryScalar(); 
			   
         	$syms =  Symptoms::find()->all();    /*PatientScreening::find()->where(['Request_Id' => 1])->all();*/
                foreach ($syms as $sn){
				          $Screen2 = new HospitalScreening();
				          $Screen2->Symp_ID = $sn->Symp_ID;
                   $Screen2->Session_ID = $maxSession;                   
                   $Screen2->value = "N";
                  // $Screen2->TimeStamp = date('y-m-d h:m:s');      
                   $Screen2->save(false);   
			        	 }
			   	 $sensors =  Sensor::find()->all();   /* PatientSensorsData::find()->where(['Request_Id' => 1])->all();*/
				       foreach ($sensors as $sn){
				       $newSensorData = new MonitorSensorsData();
				       $newSensorData->SensorID = $sn->SensorID;
				       $newSensorData->Session_ID = $maxSession;
				       //date_default_timezone_set("Asia/Riyadh");
				      // $newSensorData->Time=date('y-m-d h:m:s');
				       $newSensorData->save(false);         
				       }

			  return $this->redirect(['/patient-request/index']);
			  }        
			  if(isset($_POST['Ask'])){
				   
				   $req->Request_Status='PendingAsk';
				 $req->save(false);
				 $new=new RequestResponse();
				 $new->Request_Id=$req->Request_Id;
				 $new->respond_state='PendingAsk';
				 $new->caluculated_score=$es;
				  $cat=$_POST['cat'];
				  //$category = Category::findOne($cat)->Cat_name;
				 $new->estimated_category=$cat;
				 /*$ad=$_POST['advaices'];
				 $new->advaices=$ad;*/
				  date_default_timezone_set("Asia/Riyadh");
				 $new->responseTime=date('y-m-d h:m:s');
				  $new->responseType='hospital';
				 $new->delvirey_state='Y';
				 $note=$_POST['reason'];
				 $new->Notes=$note;
				 $new->save(false);
				   return $this->redirect(['/patient-request/index']);
			  }
			   if(isset($_POST['Sendr'])){
				 
				    $req->Request_Status='Responed';
				 $req->save(false);
				 $new=new RequestResponse();
				 $new->Request_Id=$req->Request_Id;
				 $new->respond_state='Responed';
				 $new->caluculated_score=$es;
				  $cat=$_POST['cat'];
				 // $category = Category::findOne($cat)->Cat_name;
				 $new->estimated_category=$cat;
				 /*$ad=$_POST['advaices'];
				 $new->advaices=$ad;*/
				 $new->responseTime=date('y-m-d h:m:s');
				  $new->responseType='hospital';
				 $new->delvirey_state='Y';
				 $note=$_POST['reason'];
				 $new->Notes=$note;
				 $new->save(false);
				   return $this->redirect(['/patient-request/index']);
			  }
				 	
        return $this->render('vr', [
                'model' => $model,
        				'modelr'=>$modelr,
        			    'req'=>$req,
        				'mh'=>$mh,
        				'sp'=>$sp,
        			
        				'req_id'=>$req_id,
        				'cn'=>$cn,
        				'cc'=>$cc,
        				'age'=>$age,
                'model2' => $model2,
                'model3' => $model3,
                'model4' => $model4,
                'model5' => $model5,
                'date' => $date,
                'time' => $time,
                'blood' => $blood,
                'heart' => $heart,
                'temp' => $temp,
        				'sensors'=>$sensors,
          			'symptomsData' => $symptomsData,
        				'es'=>$es,
        				'res'=>$res,
                'spo' => $spo,
               
            ]);    
    }


   public function actionIndex()
    {
        $model_filter = new PatientRequest();
        $query = PatientRequest::find();
        $searchModel = new PatientRequestSearch();
        
             if ($model_filter->load(Yii::$app->request->post())) {  
         $selected_request_status= $model_filter->Request_Status;
         if($selected_request_status != null){  
         $query->andwhere('Request_Status = :rs', [':rs' =>$selected_request_status]); 
         }
         $dataProvider = $searchModel->search($query,Yii::$app->request->queryParams); 
        }
        
           else{
         $dataProvider = $searchModel->search($query,Yii::$app->request->queryParams); 
         $selected_request_status =null;
        }



        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
             'model_filter' => $model_filter, 
            'selected_request_status' =>  $selected_request_status,
        ]);
    }
 public function actionIndexm()
    {
        return $this->render('index');
    }
    /**
     * Displays a single PatientRequest model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('vr', [
            'model' => $this->findModel($id),
        ]);
    }


    /**
     * Creates a new PatientRequest model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new HospitalSession();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            echo $param1;
            return $this->redirect(['view', 'id' => $model->Request_Id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }


    public function actionCreateSession()
    {
        $model = new PatientRequest();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->Request_Id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing PatientRequest model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->Request_Id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }


    /**
     * Deletes an existing PatientRequest model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PatientRequest model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PatientRequest the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {

        if (($model = PatientRequest::findOne($id)) !== null) {
            return $model;
        }else {

        throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


}
