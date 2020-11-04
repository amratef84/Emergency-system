<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\EmailForm;
use app\models\ResetPassForm;
use app\models\ContactForm;
use yii\helpers\Url;



class SiteController extends Controller
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

  /**
   * Displays homepage.
   *
   * @return string
   */


  public function actionDashboard()
  {
    return $this->render('home-system-admin');
  }
    
   
    
    
    public function actionHomepage()
  {
    return $this->render('home-hospital-admin');
       
  }
   public function actionEdpage()
  {
    return $this->render('ed-home');
       
  }
    
    
    
  public function actionMain()
  {
    return $this->render('index');
  }



  public function actionReset($token)
  {
    $done = false;
    $model = new ResetPassForm();

    if ($model->load(Yii::$app->request->post()) && $model->validate()) {
      $done = $model->setNewPass($token);
    }
    return $this->render('reset-password', ['model' => $model, 'done' => $done]);
  }

  public function actionForgot()
  {
    $sent = false;
    $model = new EmailForm();

    if ($model->load(Yii::$app->request->post()) && $model->validate()) {
      $sent = $model->sendResetToken();
    }
    return $this->render('forgot', ['model' => $model, 'sent' => $sent]);
  }

  public function actionSay($message = 'Hello')
  {
    return $this->render('say', ['message' => $message]);
  }


  /**
   * Login action.
   *
   * @return Response|string
   */
  public function actionIndex()
  {
    // return $this->render('index');
    if (!Yii::$app->user->isGuest) {
      return $this->checkIdentity(Yii::$app->user->identity);
    }

    $model = new LoginForm();
    if ($model->load(Yii::$app->request->post()) && $model->login()) {
      return $this->checkIdentity(Yii::$app->user->identity);
    }

    $model->password = '';
    return $this->render('login', [
      'model' => $model,
    ]);
  }

  /**
   * Logout action.
   *
   * @return Response
   */
  public function actionLogout()
  {
    Yii::$app->user->logout();

    return $this->redirect(['index']);
  }

  /**
   * Displays contact page.
   *
   * @return Response|string
   */
  public function actionContact()
  {
    $model = new ContactForm();
    if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
      Yii::$app->session->setFlash('contactFormSubmitted');

      return $this->refresh();
    }
    return $this->render('contact', [
      'model' => $model,
    ]);
  }
 

  /**
   * Displays about page.
   *
   * @return string
   */
  public function actionAbout()
  {
    return $this->render('about');
  }

  public function actionSettingparameter(){

    return $this->render('settingparameter');

  }



  function checkIdentity($identity){
    // check roles
      
  
    if($identity->Role_Id == 1){  // home-system-admin
      return $this->redirect(['dashboard']);
    } else if($identity->Role_Id == 2){  // ig home-hospital-admin
      return $this->redirect(['homepage']);
    } else if($identity->Role_Id == 3){  // if employee
      return $this->redirect(['edpage']);
    }    
  }

}
