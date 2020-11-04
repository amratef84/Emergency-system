<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\RegisteredPatientAccount;
use app\models\PatientMedicalHistory;
use app\models\PatientSearch;
use app\models\PatientRequest;
use app\models\HospitalSession;
use app\models\PatientSensorsData;
use app\models\Category;
use app\models\CovidCatagory;
use app\models\MedicalHistory;
use app\models\PatientScreening;
use app\controllers\CategoryController;
use app\models\Symptoms;
use yii\web\NotFoundHttpException;

class EmployeeController extends SuperController
{
     /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
    
      public function actionView()
    {
          /*$model = RegisteredPatientAccount::find()->all();
         
        return $this->render('patients_view', [
                'model' => $model,
                
            ]);   */ 
        $searchModel = new PatientSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('patients_view', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
           
    }
      public function actionTransfer()
    {
          /*$model = RegisteredPatientAccount::find()->all();
         
        return $this->render('patients_view', [
                'model' => $model,
                
            ]);   */ 
        $searchModel = new PatientSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('transfer_patients', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
           
    }
    
    public function actionTransfer_patients()
    {
              
               $model = new RegisteredPatientAccount();/*::find()->all();*/
        /* if ($model->load(Yii::$app->request->post())) {
            $pt = RegisteredPatientAccount::findOne($model->Patient_NId);
            $pt->Unit_id = $model->Unit_id;
            if($pt->save(false)){
            $req = PatientRequest::find()->where('Patient_Id = :ti', [':ti' =>$pt->Patient_Id])->one(); 
            if($req != null){        
            $hs = HospitalSession::find()->where('Request_Id = :ti', [':ti' =>$req->Request_Id])->one();
            $hs->Unit_id = $model->Unit_id;
            $hs->save(false);
            }
              Yii::$app->response->redirect(array('employee/transfer_patients'));
            } 
        }*/
        

       /* $sql='SELECT
                    patient_request.Request_Id,
                    registered_patient_account.Patient_FName,
                    registered_patient_account.Patient_LName,
                    hospital_session.Unit_id,
                    hospital_session.Session_ID
                FROM
                    patient_request,
                    registered_patient_account,
                    hospital_session
                WHERE
                    patient_request.Request_Id = hospital_session.Request_Id AND patient_request.Patient_Id = registered_patient_account.Patient_Id';

                    $con = Yii::$app->getDb();
                    $command =
                   $con->createCommand($sql); */

                /*$command->bindValue(':ri',$req->Request_Id);*/
               // $model2 = $command->queryAll(); 


          $model2 = RegisteredPatientAccount::find()->all();
         
        return $this->render('transfer_patients', [
                'model' => $model,
                'model2' => $model2,
                
            ]);    
           
    }
    
    public function actionPatient_info($id)
    {

          $model = RegisteredPatientAccount::findOne($id);
          $name = $model->Patient_FName.' '.$model->Patient_LName;
          $model2 = PatientMedicalHistory::find()->where('Patient_Id = :ti', [':ti' =>$model->Patient_Id])->all();
           
         /*if($model2 == null){
               Yii::$app->session->setFlash('error',Yii::t('app', 'Patient does not have medical history'));
                     return $this->goBack();     
           }*/
          $req = PatientRequest::find()->where('Patient_Id = :ti', [':ti' =>$model->Patient_Id])->orderBy('Request_Id DESC')->one();         
            if($req == null){
               Yii::$app->session->setFlash('error',Yii::t('app', 'Patient does not have request'));
                     return $this->goBack();
           }
           $req_id= $req->Request_Id;      
          $es = $req->Estimated_score;
          if($req->Estimated_Level==0){
                
                $cn="no category found";
                
            }
            else{
            
            $cn = Category::findOne($req->Estimated_Level)->Cat_name;
            
            }
            if($req->Estimated_COVID==0){               
                
                $cc="no covid category found";
            }
            else{       
            
            $cc = CovidCatagory::findOne($req->Estimated_COVID)->Case_Name;
            }
          $date = explode(" ", $req->RequestTime)[0];
          $t = explode(" ", $req->RequestTime)[1];
          $time = explode(".", $t)[0];

           $sensors = PatientSensorsData::find()->where('Request_Id = :ti', [':ti' =>$req->Request_Id])->all();
            if($sensors == null){
               Yii::$app->session->setFlash('error',Yii::t('app', 'Patient does not have sensors'));
                     return $this->goBack();     
           }
            $spo = PatientSensorsData::find()->where('Request_Id = :ti', [':ti' =>$req->Request_Id])->andwhere('SensorID = 4')->one();
            if($spo == null){
               Yii::$app->session->setFlash('error',Yii::t('app', 'Patient does not have spo'));
                     return $this->goBack();     
           }
            $model5 = PatientScreening::find()->where('Request_Id = :ti', [':ti' =>$req->Request_Id])->all();
            if($model5 == null){
               Yii::$app->session->setFlash('error',Yii::t('app', 'Patient does not have screening'));
                     return $this->goBack();     
           }

            $model4 = HospitalSession::find()->where('Request_Id = :ti', [':ti' =>$req->Request_Id])->one();
            if($model4 == null){
               Yii::$app->session->setFlash('error',Yii::t('app', 'Patient does not have session'));
                    // return $this->goBack();
                    $category =null ;     
           }
           else
           {
            $category = Category::findOne($model4->Cat_ID)->Cat_name;
            
            if($category == null){
               Yii::$app->session->setFlash('error',Yii::t('app', 'Patient does not have category'));
                     return $this->goBack();     
           }           

        $current_status = $model4->patient_status;
        $current_unit = $model4->Unit_id;
        $current_reason = $model4->reason;
        if ($model4->load(Yii::$app->request->post())) {
           
            if(\Yii::$app->request->post('submit') == 'save'){  
            if(($current_status != $model4->patient_status && $model4->reason ==  '' ) || ($current_unit != $model4->Unit_id && $model4->reason ==  '' ) ){
                  Yii::$app->session->setFlash('error',Yii::t('app', 'You must write reason to change'));
                     return $this->goBack();
            }

            if($model4->reason ==  ''){
               $model4->reason = $current_reason; 
            }
            if($model4->save(false)){
            $model->Unit_id = $model4->Unit_id;  
            $model->save(false);
                
            Yii::$app->session->setFlash('success',Yii::t('app', 'The information has been updated'));
                     return $this->goBack();
            }
            }
            
            else{
             $model4->Session_status = "Closed" ; 
                   if($model4->save(false)){
            Yii::$app->session->setFlash('success',Yii::t('app', 'Checkout complete'));
                     return $this->goBack();
            }
                 
             }
        }
    }     
      $mh=MedicalHistory::find()->FilterWhere(['=','Patient_Id',$req->Patient_Id]);
     
     // $dis=DiseaseDictionary::find();
     $symptomsData = Symptoms::find()->FilterWhere(['!=','Target','only-patient'])->orderBy(['Symp_Group'=>SORT_ASC]);
     // PatientScreening::find()->FilterWhere(['=','Request_Id' ,$req->Request_Id]);
     

        return $this->render('patient_info', [
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

            ]);    
           
    }

}
