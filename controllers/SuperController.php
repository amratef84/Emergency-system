<?php

namespace app\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


class SuperController extends Controller
{

public function beforeAction($action){

    
       $session = Yii::$app->session;
        !$session->isActive ? $session->open() : $session->close();
        $lang = $session->get('lang');
        if($lang ==null){
            $lang ="en-EN";
        }
        Yii::$app->language = $lang;
        $session->close();
    
     Yii::$app->user->returnUrl = Yii::$app->request->referrer;

    
  return parent::beforeAction($action);
}
    
    
}
