<?php

namespace app\controllers;

use Yii;
use app\models\Patient;
use app\models\Hospital;

use app\models\PatientRequest;
use app\models\PatientSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PatientController implements the CRUD actions for Patient model.
 */
class PatientController extends Controller
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
     * Lists all Patient models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PatientSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
  
     public function actionView($id)
    {
        return $this->render('patient_info', [
            'model' => $this->findModel($id),
        ]);
    }
    

 
    protected function findModel($id)
    {
        if (($model = Patient::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
       public function actionGrid()
   {
     $dataProvider =new ActiveDataProvider([
     'query' => Patient::find(),
     'pagination'=>[
     'pageSize'=>20,
      ],



     ]);	
      return $this->render('grid', ['dataProvider1' => $dataProvider]);
   }
   
   
}
