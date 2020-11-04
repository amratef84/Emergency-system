<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\Url;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */

class EmailForm extends Model
{
  public $email;

  public function rules()
  {
    return [
      ['email', 'required'],
      ['email', 'email'],
      ['email', 'checkEmail'],
    ];
  }

  
  public function checkEmail($attribute, $params){
    $user =  User::findByEmail($this->email);
    if(!$user){
      $this->addError($attribute, 'Email is not exists.');
    }
  }

  public function sendResetToken(){
    $user =  User::findByEmail($this->email);
    if($user){
      $user->reset_token = Yii::$app->security->generateRandomString(24);
      $user->save();
      Yii::$app->mailer
        ->compose(['html' => 'layouts/reset_token'], ['token' => Url::base(true) . '/site/reset?token=' . $user->reset_token])
        ->setFrom('noreply@gmail.com')
        ->setTo($this->email)
        ->setSubject('Your Reset Token')
        ->send();
      return true;
    }else{
      return false;
    }
  }
}
