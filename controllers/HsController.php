<?php

namespace app\controllers;

use Yii;
use app\models\Hs;
use app\models\Unitt;
use app\models\HsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\RegisteredPatientAccount;
use app\models\PatientMedicalHistory;
use app\models\PatientSearch;
use app\models\PatientRequest;
use app\models\HospitalSession;
use app\models\PatientSensorsData;
use app\models\Category;
use app\models\PatientScreening;
use app\models\CovidCatagory;
use app\models\MedicalHistory;
use app\controllers\CategoryController;
use app\models\Symptoms;
use app\models\HospitalScreening;
use app\models\RequestResponse;
use app\models\Sensor;
use app\models\Symsen;
use app\models\MonitorSensorsData;
/**
 * HospitalSessionController implements the CRUD actions for HospitalSession model.
 */
class HsController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all HospitalSession models.
     * @return mixed
     */
    public function actionIndex($unit_id)
    {
        if(isset($_POST['view']))
        {
          echo "aaaa";  
        } 
        else{       
        $unit_name = Unitt::findOne($unit_id)->Unit_name;
        $model_filter = new Hs();
        $query = Hs::find()->where('Unit_id = :ui',[':ui' =>$unit_id]);
        $searchModel = new HsSearch();
        if ($model_filter->load(Yii::$app->request->post())) {  
         $selected_session_status= $model_filter->Session_status;
         if($selected_session_status != "0"){  
         $query->andwhere('Session_status = :ss', [':ss' =>$selected_session_status]); 
         }
         $dataProvider = $searchModel->search($query,Yii::$app->request->queryParams); 
        }
        else{
         $dataProvider = $searchModel->search($query,Yii::$app->request->queryParams); 
         $selected_session_status ="0";
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model_filter' => $model_filter, 
            'selected_session_status' =>  $selected_session_status,
           'unit_name' => $unit_name, 
        ]);
    }
    }

    /**
     * Displays a single HospitalSession model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView()
    {
         echo "jdjasldjalks";
        /*return $this->render('view', [
            'model' => $this->findModel($id),
        ]);*/
    }

    /**
     * Creates a new HospitalSession model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Hs();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->Session_ID]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing HospitalSession model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->Session_ID]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing HospitalSession model.
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
     * Finds the HospitalSession model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return HospitalSession the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Hs::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionInfo_patient($id,$Unit_id)
    {          
          $model = RegisteredPatientAccount::findOne($id);
          $name = $model->Patient_FName.' '.$model->Patient_LName;
          $model2 = PatientMedicalHistory::find()->where('Patient_Id = :ti', [':ti' =>$model->Patient_Id])->all();

     
        // $dis=DiseaseDictionary::find();
         $symptomsData = Symptoms::find()->FilterWhere(['!=','Target','only-patient'])->orderBy(['Symp_Group'=>SORT_ASC]);
         /*if($model2 == null){
               Yii::$app->session->setFlash('error',Yii::t('app', 'Patient does not have medical history'));
                     return $this->goBack();     
           }*/
          $req = PatientRequest::find()->where('Patient_Id = :ti', [':ti' =>$model->Patient_Id])->orderBy('Request_Id DESC')->one();
            if($req == null){
               Yii::$app->session->setFlash('error',Yii::t('app', 'Patient does not have request'));
                    return $this->redirect(['index','unit_id'=>$Unit_id]);
           }
            $mh=MedicalHistory::find()->FilterWhere(['=','Patient_Id',$req->Patient_Id]);
           $es = $req->Estimated_score;
           $req_id= $req->Request_Id;  
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
          $date = explode(" ", $req->RequestTime)[0];
          $t = explode(" ", $req->RequestTime)[1];
          $time = explode(".", $t)[0];
           $sensors = PatientSensorsData::find()->where('Request_Id = :ti', [':ti' =>$req->Request_Id])->all();
            $sensors2 = PatientSensorsData::find()->FilterWhere(['=','Request_Id',$req->Request_Id]);

            if($sensors == null){
               Yii::$app->session->setFlash('error',Yii::t('app', 'Patient does not have sensors'));
                     return $this->redirect(['index','unit_id'=>$Unit_id]);    
           }
            $spo = PatientSensorsData::find()->where('Request_Id = :ti', [':ti' =>$req->Request_Id])->andwhere('SensorID = 4')->one();
            if($spo == null){
               Yii::$app->session->setFlash('error',Yii::t('app', 'Patient does not have spo'));
                     return $this->redirect(['index','unit_id'=>$Unit_id]);    
           }
            $model4 = HospitalSession::find()->where('Request_Id = :ti', [':ti' =>$req->Request_Id])->andWhere('Unit_id = :ui',[':ui'=>$Unit_id])->one();
            if($model4 == null){
               Yii::$app->session->setFlash('error',Yii::t('app', 'Patient does not have session'));
                     return $this->redirect(['index','unit_id'=>$Unit_id]);     
           }
           $S_id=$model4->Session_ID;
           $sensorData = MonitorSensorsData::find()->FilterWhere(['=','Session_ID',$S_id]);
            $category = Category::findOne($model4->Cat_ID)->Cat_name;
            
            if($category == null){
               Yii::$app->session->setFlash('error',Yii::t('app', 'Patient does not have category'));
                     return $this->redirect(['index','unit_id'=>$Unit_id]);     
           }
            $model5 = PatientScreening::find()->where('Request_Id = :ti', [':ti' =>$req->Request_Id])->all();
            if($model5 == null){
               Yii::$app->session->setFlash('error',Yii::t('app', 'Patient does not have screening'));
                     return $this->redirect(['index','unit_id'=>$Unit_id]);     
           }

        $current_status = $model4->patient_status;
        $current_unit = $model4->Unit_id;
        $current_reason = $model4->reason;
        
        $user=Yii::$app->user->identity->User_ID;
        $idu =(new\yii\db\Query())->select(['Hosp_id'])->from('hospital_employee')->FilterWhere(['=','User_ID',$user]);
        $Eid=(new\yii\db\Query())->select(['employee_ID'])->from('hospital_employee')->FilterWhere(['=','User_ID',$user]);    

        if(isset($_POST['update'])){  
         // echo "aaaaaaaaa";

                 foreach($symptomsData->all() as $sd){
                 $value =Yii::$app->request->post('sym_value'.$sd->Symp_ID); 
                 $ps = HospitalScreening::find()->where('Session_ID = :ri',[':ri'=>$S_id])->andWhere('Symp_ID = :si',[':si'=>$sd->Symp_ID])->one();
                 if($value == "1"){
                     /*if($ps->ByDone==null)
                     {
                      $ps->ByDone=null; 
                     }*/
                    $ps->value = "Y";                                   
                    $ps->save(false); 
                 }else{   
                  $ps->value = "N";  
                  $ps->ByDone="   ";         
                  $ps->save(false);     
                 }                     
                }
               Yii::$app->session->setFlash('success','updated successfully');
        }//update_monitor
        if(isset($_POST['update_monitor'])){  
         /*echo "aaaaaaaaa";*/

                 // $sensorData->save(false);
                 foreach($sensorData->all() as $sd){
                 $value =Yii::$app->request->post('sensor_value'.$sd->SensorID); 
                 $ps = MonitorSensorsData::find()->where('Session_ID = :ri',[':ri'=>$S_id])->andWhere('SensorID = :se',[':se'=>$sd->SensorID])->one();
                
                  $ps->Value = $value;
                  $ps->save(false);                 
                }
               Yii::$app->session->setFlash('success','updated successfully');
        }//get_update
        if(isset($_POST['get_update'])){  
         /*echo "aaaaaaaaa";*/

                $dateMonetor = MonitorSensorsData::find()->where('Session_ID = :ri',[':ri'=>$S_id])->all();//andWhere('SensorID = :se',[':se'=>$sd->SensorID])->one(); 
                 $symsenData= Symsen::find()->all(); 

                 foreach($symsenData as $sd){
                  /*echo $sd->Sen_ID;*/
                    foreach($dateMonetor as $dm){                  
                 if($sd->Sen_ID  == $dm->SensorID && $dm->Value > $sd->Rang_Min && $dm->Value < $sd->Rang_Max)
                 {
                 $ps = HospitalScreening::find()->where('Session_ID = :ri',[':ri'=>$S_id])->andWhere('Symp_ID = :si',[':si'=>$sd->Sym_ID])->one();
                                               
                  $ps->value = "Y";
                  /*if($ps->ByDone=="   ")
                     {*/
                      $ps->ByDone="Sensor-based";
                    // }
                  $ps->save(false); 
                  
                    } 
                  }
                }
                 Yii::$app->session->setFlash('success','updated successfully');
        }//get_update
        if ($model4->load(Yii::$app->request->post())) {
           
            if(Yii::$app->request->post('submit') == 'save'){  
                if(($current_status != $model4->patient_status && $model4->reason ==  '' ) || ($current_unit != $model4->Unit_id && $model4->reason ==  '' ) ){
                      Yii::$app->session->setFlash('error',Yii::t('app', 'You must write reason to change'));
                         return $this->redirect(['index', 'unit_id' => $model4->Unit_id]);
                }

                if($model4->reason ==  ''){
                   $model4->reason = $current_reason; 
                }
                if($model4->save(false)){
               // $model->Unit_id = $model4->Unit_id;  
               // $model->save(false);
                    
                Yii::$app->session->setFlash('success',Yii::t('app', 'The information has been updated'));
                        return $this->redirect(['index', 'unit_id' => $model4->Unit_id]);
                }
            }
            else if(Yii::$app->request->post('submit') == 'Admit')
            {
               //echo "a";
               $model4->Session_status = "In Service" ; 
                   if($model4->save(false)){
                 Yii::$app->session->setFlash('success',Yii::t('app', 'Admit complete'));
                     return $this->redirect(['index', 'unit_id' => $model4->Unit_id]);
               }   
            }            
            else if(Yii::$app->request->post('submit') == 'Trasfer')
            {
              $model4->Session_status = "Transferred" ;
               $model4->save(false);
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
         
         $unt=$_POST['unit'];
         $modelcreat->Cat_ID=$name;
         $modelcreat->patient_status='unstable';
         $modelcreat->Hosp_decision=11;
         //$unit=$_POST['Flu'];
         // $u=(new\yii\db\Query())->select(['Unit_id'])->from('unit')->FilterWhere(['=','default_unit',$unt]);
         $modelcreat->Unit_id=$unt;
         $modelcreat->Covid_status=$covid_id;
         $Eid=(new\yii\db\Query())->select(['employee_ID'])->from('hospital_employee')->FilterWhere(['=','User_ID',$user]);
         $modelcreat->employee_ID=$Eid;
        /* $modelcreat->advices=$_POST['advaices'];*/
         $modelcreat->calculated_Score=$es;
          $rse="";//$_POST['res'];
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
          
         $new->estimated_category=$cat;
         /*$ad=$_POST['advaices'];
         $new->advaices=$ad;*/
          date_default_timezone_set("Asia/Riyadh");
         $new->responseTime=date('y-m-d h:m:s');
          $new->responseType='hospital';
         $new->delvirey_state='Y';
         /*$note=$_POST['reason'];
         $new->Notes=$note;*/
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
               Yii::$app->session->setFlash('success',Yii::t('app', 'Trasfer complete'));
                     return $this->redirect(['index', 'unit_id' => $model4->Unit_id]);
           }
            else if(Yii::$app->request->post('submit') == 'Reject')
            {
                //echo "r";
                $model4->Session_status = "Rejected" ; 

                $req->Request_Status='Rejected';
                 $req->save(false);
                 $new= new RequestResponse();
                 $new->Request_Id=$req->Request_Id;
                 $new->caluculated_score=$es;
                 $new->respond_state='Rejected';
                 $cat=$_POST['cat'];
                 //$category = Category::findOne($cat)->Cat_name;
                 $new->estimated_category=$cat;
                 $ad=$_POST['adv'];
                 $new->advaices=$ad;
                  date_default_timezone_set("Asia/Riyadh");
                 $new->responseTime=date('y-m-d h:m:s');
                 $new->responseType='hospital';
                 $new->delvirey_state='Y';
                 /*$note=$_POST['reason'];
                 $new->Notes=$note;*/
                 $new->save(false);
                   if($model4->save(false)){
                 Yii::$app->session->setFlash('success',Yii::t('app', 'Reject complete'));
                     return $this->redirect(['index', 'unit_id' => $model4->Unit_id]);

               }  
            }
            else if(Yii::$app->request->post('submit') == 'check')
            {
                $model4->Session_status = "Closed" ; 
                   if($model4->save(false)){
                 Yii::$app->session->setFlash('success',Yii::t('app', 'Checkout complete'));
                   return $this->redirect(['index', 'unit_id' => $model4->Unit_id]);
               }      
            }
            else{
                       
         }
        }    

         // $model4-
        return $this->render('info_patient', [
                'model' => $model,
                'model2' => $model2,
                'model4' => $model4,
                'model5' => $model5,
                'req' => $req,
                'req_id'=>$req_id,
                'date' => $date,
                'time' => $time,
                'sensors' => $sensors,
                'spo' => $spo,
                'category' => $category,
                'es' => $es,
                'name' => $name,
                'cn'=>$cn,
                'cc'=>$cc,
                'symptomsData' => $symptomsData,
                'mh'=>$mh,
                'sensorData' => $sensorData,
                'sensors2' => $sensors2,

            ]);    
           
    }
    /*public function actionSend($req_id)
    {
        echo $req_id;
    } */   
}