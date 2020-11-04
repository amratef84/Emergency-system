<?php
namespace app\controllers;
 
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\models\MakeRequest;
use app\models\PatientRequest;
use app\models\Symptoms;
use app\models\SymptomsGroup;
use app\models\PatientSensorsData;
use app\models\Sensor;
use app\models\PatientScreening;
use yii\web\Controller;
 use app\models\Patient;
use app\models\Category;
use app\models\CovidCatagory;
use app\models\RequestResponse;
use app\models\SystemParameter;
use app\models\HospitalSession;
use app\models\HospitalScreening;

/**
 * manual CRUD
 **/
class RequestController extends Controller
{  

public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
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
  

    public function actionMake_button($patient_id){
		
		 $newRequest = new PatientRequest();
     date_default_timezone_set("Asia/Riyadh");


      //insert reuqest
      $newRequest->RequestTime=date('y-m-d h:m:s');
      $newRequest->Request_Type='By ED';
      $newRequest->Patient_Id=$patient_id;
      $newRequest->save();
      $req_id = $newRequest->getPrimaryKey();

           //  $Session = HospitalSession::find()->where('Request_Id = :ri',[':ri'=>$req_id])->one();
      //insert sensors for request
       $sensors = Sensor::find()->all();
       foreach ($sensors as $sn){
       $newSensorData = new PatientSensorsData();
       $newSensorData->SensorID = $sn->SensorID;
       $newSensorData->Request_Id = $req_id;
       date_default_timezone_set("Asia/Riyadh");
       $newSensorData->Time=date('y-m-d h:m:s');
       $newSensorData->save(false);         
       }
        
        //insert patient screen for request
       $syms = Symptoms::find()->where('Target != :ti',[':ti'=>"only-patient"])->all();
       foreach ($syms as $sn){
       $newScreen = new PatientScreening();       
       $newScreen->Request_Id = $req_id;
       $newScreen->Symp_ID = $sn->Symp_ID;
       $newScreen->Value = "N";
       $newScreen->SensorResult = "N";
       $newScreen->save(false);   
       }
        
	    return $this->redirect(['request/make','request_id'=> $req_id]); 
		
	}
    
    
      
    public function actionMake($request_id)
        
    {
		
	
        $model = PatientRequest::find()->FilterWhere(['=','Request_Id',$request_id]);
        $sensorData = PatientSensorsData::find()->FilterWhere(['=','Request_Id',$request_id]);
        $symptomsData =  Symptoms::find()->FilterWhere(['!=','Target','only-patient'])->orderBy(['Symp_Group'=>SORT_ASC]);
	    	$res=new RequestResponse();
        // $Session = HospitalSession::find()->where('Request_Id = :ri',[':ri'=>$request_id])->one();
		
		   if(\Yii::$app->request->post('submit') == 'submit'){ 
              
               //save sensor values
                foreach($sensorData->all() as $sd){
                 $value =Yii::$app->request->post('sensor_value'.$sd->SensorID); 
                 $ps = PatientSensorsData::find()->where('Request_Id = :ri',[':ri'=>$request_id])->andWhere('SensorID = :si',[':si'=>$sd->SensorID])->one();
                 $ps->Value = $value;
                 date_default_timezone_set("Asia/Riyadh");
                 $ps->Time=date('y-m-d h:m:s');
                 $ps->save(false);       
                }  
              
                  //save Symptoms values
                  foreach($symptomsData->all() as $sd){
                 $value =Yii::$app->request->post('sym_value'.$sd->Symp_ID); 
                 $ps = PatientScreening::find()->where('Request_Id = :ri',[':ri'=>$request_id])->andWhere('Symp_ID = :si',[':si'=>$sd->Symp_ID])->one();
                
                 if($value == "1"){
                  $ps->Value = "Y";
                  $ps->SensorResult = "Y";
                  //$ps->ByDone=null;
                  $ps->save(false); 
                 }else{   
                  $ps->Value = "N";
                  $ps->SensorResult = "N";
                  $ps->save(false);     
                 } 
                }
              
               /*
                Algorithm 1 (Calculting total score for a patient request )
                */
               //get patient brith date
                $birthDate = Patient::findOne($model->one()->Patient_Id)->DateofBirth;
              
               //calulate patient age
                $birthDate = explode("-", $birthDate);
                $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[2], $birthDate[1], $birthDate[0]))) > date("md")
                ? ((date("Y") - $birthDate[0]) - 1)
                : (date("Y") - $birthDate[0]));
              
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
                $command->bindValue(':ri',$request_id);
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
              
                /*
                Algorithm 2 (Estimating category/level for a patient request based on the scores)
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
                Algorithm 3 (Estimating COVID19 cases for a patient request based on the scores)
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
                $req = PatientRequest::findOne($request_id);
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
				 $res->Request_Id=$request_id;
				 $res->caluculated_score=$TotalScore;
				 $res->estimated_category=$Estimated_Catagory_name;
				 date_default_timezone_set("Asia/Riyadh");
                 $res->responseTime=date('y-m-d h:m:s');
				 $res->advaices='default';
				 $res->responseType='auto';
				 $res->delvirey_state='Y';
				 $res->save(false);
                 /*
                Print result
                */
                //Yii::$app->session->setFlash('success',"Algorithm 1...TotalScore:  ".$TotalScore."<br><br> Algorithm 2...Category name:  ".$Estimated_Catagory_name."<br><br> Algorithm 3...Covid category name:  ".$Estimated_Case_name);
                Yii::$app->session->setFlash('success','Saved successfully');
			          return $this->redirect(['/patient-request/index']);

              }
	
        
        return $this->render('make', [
            'model' => $model,
            'sensorData' => $sensorData,
            'symptomsData' => $symptomsData,
            'request_id' => $request_id,
		      	'res'=> $res,
    
        ]);
    }
    
    
      public function actionCancel($request_id)
        
    {
		PatientSensorsData::deleteAll(['Request_Id' => $request_id]);
        PatientScreening::deleteAll(['Request_Id' => $request_id]);
		RequestResponse::deleteAll(['Request_Id' => $request_id]);
        PatientRequest::findOne($request_id)->delete();
		$con = Yii::$app->getDb();
		$con->createCommand('alter table patient_request  AUTO_INCREMENT =1')->execute();
          return $this->redirect(['patient/index']);  
      }
 
 
 
 /**
     public function actionIndex()
    {
        $searchModel = new SensorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
	
*/

public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    
    protected function findModel($id)
    {
        if (($model = Sensor::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


}