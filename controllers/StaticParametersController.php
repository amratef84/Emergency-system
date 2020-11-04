<?php

namespace app\controllers;

use Yii;

use app\models\Hospital;
use app\models\RegisteredPatientAccount;
use app\models\CovidCases;

use app\models\Unit;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * HospitalEmployeeController implements the CRUD actions for HospitalEmployee model.
 */
class StaticParametersController extends Controller
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
     * @return mixed
     */
    public function actionIndex()
    {

        $hospitalsCount = Hospital::getHospitalsCount();
        $unitsCount = Unit::getUnitsCount();
        $patientsCount = RegisteredPatientAccount::getPatientsCount();

        $positiveCasesCount = CovidCases::getCasesCount('positive');
        $suspectedCasesCount = CovidCases::getCasesCount('suspected');
        $negativeCasesCount = CovidCases::getCasesCount('negative');
        $recoveredCasesCount = CovidCases::getCasesCount('recovered');


        return $this->render('index', [

            'hospitalsCount' => $hospitalsCount,
            'unitsCount' => $unitsCount,
            'patientsCount' => $patientsCount,
            'positiveCasesCount' => $positiveCasesCount,
            'negativeCasesCount' => $negativeCasesCount,
            'recoveredCasesCount' => $recoveredCasesCount,
            'suspectedCasesCount' => $suspectedCasesCount,


        ]);
    }

    /**
     * Displays a single HospitalEmployee model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */


    /**
     * Creates a new HospitalEmployee model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    protected function findModel($id)
    {
        if (($model = HospitalEmployee::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
