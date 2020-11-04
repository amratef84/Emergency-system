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

class ResetPassForm extends Model
{

  public $password;
  public $password2;

  public function rules()
  {
    return [
      [['password', 'password2'], 'required'],
      ['password2', 'compare', 'compareAttribute' => 'password'],
    ];
  }

  public function setNewPass($token){
    $user =  User::findByResetToken($token);
    if($user){
      $user->reset_token = '';
      $user->Password = md5($this->password);
      $user->save();
      return true;
    }else{
      $this->addError('password2', 'Invalid reset link.');
      return false;
    }
  }
}
