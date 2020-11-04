<?php

namespace app\controllers;

use Yii;
use app\models\User;
use app\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\HospitalEmployee;


/**
 * UserController implements the CRUD actions for Useraccount model.
 */
class UserController extends Controller
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
   * Lists all Useraccount models.
   * @return mixed
   */
  public function actionIndex()
  {
    $searchModel = new UserSearch();
    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

    return $this->render('index', [
      'searchModel' => $searchModel,
      'dataProvider' => $dataProvider,
    ]);
  }

  /**
   * Displays a single Useraccount model.
   * @param integer $id
   * @return mixed
   * @throws NotFoundHttpException if the model cannot be found
   */
  public function actionView($id)
  {
    return $this->render('view', [
      'model' => $this->findModel($id),
    ]);
  }

  /**
   * Creates a new Useraccount model.
   * If creation is successful, the browser will be redirected to the 'view' page.
   * @return mixed
   */
  public function actionCreate()    {

    $model = new User();
    $model1= new HospitalEmployee();
    $model->reset_token = '';
    if ($model->load(Yii::$app->request->post()) && $model1->load(Yii::$app->request->post())) {
      $model->save();
      $model->Password = md5($model->Password);
      $model1->employee_ID=$model->User_ID;
      $model1->User_ID=$model->User_ID;
      $model1->save();
      if($model->save() && $model1->save())
        return $this->redirect(['index']);
    } else {
      return $this->render('create', [
        'model' => $model, 'model1' => $model1,
      ]);
    }
  }
  /**
   * Updates an existing Useraccount model.
   * If update is successful, the browser will be redirected to the 'view' page.
   * @param integer $id
   * @return mixed
   * @throws NotFoundHttpException if the model cannot be found
   */
  public function actionUpdate($id)
  {
    $model = $this->findModel($id);
    $prevPass = $model->Password;
    $model->Password = '';
    $model1= HospitalEmployee::findOne($id);
    if ($model->load(Yii::$app->request->post()) && $model1->load(Yii::$app->request->post())) {
      if($model->Password == ''){
        $model->Password = $prevPass;
      }else{
        $model->Password = md5($model->Password);
      }
      if($model->save() && $model1->save())
        return $this->redirect(['index']);
      return $this->redirect(['view', 'id' => $model->User_ID]);
    }

    return $this->render('update', [
      'model' => $model, 
      'model1' => $model1, 
    ]);
  }

  /**
   * Deletes an existing Useraccount model.
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
   * Finds the Useraccount model based on its primary key value.
   * If the model is not found, a 404 HTTP exception will be thrown.
   * @param integer $id
   * @return Useraccount the loaded model
   * @throws NotFoundHttpException if the model cannot be found
   */
  protected function findModel($id)
  {
    if (($model = User::findOne($id)) !== null) {
      return $model;
    }

    throw new NotFoundHttpException('The requested page does not exist.');
  }
}
