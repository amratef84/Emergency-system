<?php

namespace app\controllers;

use Yii;

use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\RegistrationForm;
use app\models\DiseaseDictionary;
use app\models\MedicalHistory;
use app\models\SearchLocation;
use app\models\HospitalEmployee;
use app\models\User;

class RegisterController extends Controller
{
    /**
     * {@inheritdoc}
     */
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
	 public function actionCreate()
    {
       $model = new RegistrationForm();
		$model2= new DiseaseDictionary();
		$model3 = new MedicalHistory();
		$model1 = new SearchLocation();


	   if($model->load(Yii::$app->request->post())){
		   $id=1;
		   $unit=(new\yii\db\Query())->select(['Unit_id'])->from('unit')->FilterWhere(['=','default_unit',$id]);
		   $model->Unit_id=$unit;

		   $model->save();
		   $max = Yii::$app->db->createCommand('SELECT max(Patient_Id) as max FROM registered_patient_account')->queryScalar(); 
		    		
		    		/* Yii::$app->session->setFlash('success','registered');
	                       return $this->redirect(['/patient/index']);*/
	                       
			  if(!empty($_POST['checked'])){
				 
				  foreach($_POST['checked'] as $ch)
				  {        
				 
				          $model3->load(Yii::$app->request->post());
						  
					     $model3->Disease_Id=$ch[0];
						  date_default_timezone_set("Asia/Riyadh");
			              $model3->Date_Time = date('Y-m-d h:m:s');
			             $model3->Patient_Id=$max;
						 $model3->Disease_Status='hospital';
						 $value =Yii::$app->request->post('Disease_Since'.$ch);
						 $model3->Disease_Since=$value;
						 $user=Yii::$app->user->identity->User_ID;
						 $idu =(new\yii\db\Query())->select(['Hosp_id'])->from('hospital_employee')->FilterWhere(['=','User_ID',$user]);
						 $model3->Hosp_id=$idu;
                         $model3->isNewRecord=true;
						 $model3->save();
				  
				  }
				   Yii::$app->session->setFlash('success','registered and Madical');
	                       return $this->redirect(['/patient/index']);
				  
	            }else{
	                       Yii::$app->session->setFlash('success','registered');
	                       return $this->redirect(['/patient/index']);
						}
	                   } else{     
       return $this->render('registration', ['model'=>$model,'model2'=>$model2,'model3'=>$model3]);
		}
    }
/*	public function actionRegistration() {
		$model = new RegistrationForm();
		$model2= new DiseaseDictionary();
		$model3 = new MedicalHistory();
		$model1 = new SearchLocation();


  
	   if($model->load(Yii::$app->request->post())){
		     
		   $model->save();
		   $max = Yii::$app->db->createCommand('SELECT max(Patient_Id) as max FROM registered_patient_account')->queryScalar(); 
		    		
		    		 Yii::$app->session->setFlash('success','registered');
	                       return $this->redirect(['/patient/index']);

			  if(!empty($_POST['checked'])){
				 
				  foreach($_POST['checked'] as $ch)
				  {        
				 
				          $model3->load(Yii::$app->request->post());
						  
					     $model3->Disease_Id=$ch[0];
						  date_default_timezone_set("Asia/Riyadh");
			              $model3->Date_Time = date('Y-m-d h:m:s');
			             $model3->Patient_Id=$max;
						 $model3->Disease_Status='hospital';
						 $value =Yii::$app->request->post('Disease_Since'.$ch);
						 $model3->Disease_Since=$value;
						 $user=Yii::$app->user->identity->User_ID;
						 $idu =(new\yii\db\Query())->select(['Hosp_id'])->from('hospital_employee')->FilterWhere(['=','User_ID',$user]);
						 $model3->Hosp_id=$idu;
                         $model3->isNewRecord=true;
						 $model3->save();
				  
				  }
				   Yii::$app->session->setFlash('success','registered');
	                       return $this->redirect(['/patient/index']);
				  
	            }else{
	                       Yii::$app->session->setFlash('success','registered');
	                       return $this->redirect(['/patient/index']);
						}
	   } else{
	   
	   echo "amr atef";
   //return $this->render('registration', ['model'=>$model,'model2'=>$model2,'model3'=>$model3]);
				}
 }*/
	
	 

}
?>

  