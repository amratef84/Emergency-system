<?php

namespace app\models;
use Yii;


class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{


  /**
   * This is the model class for table "useraccount".
   *
   * @property int $User_ID
   * @property string $Username
   * @property string $Password
   * @property int $Role_Id
   * @property int $Category
   * @property string $Description
   * @property string $Status
   */



  public static function tableName()
  {
    return 'useraccount';
  }

  public function rules()
  {
    return [
      [['User_ID', 'Username', 'Password', 'Role_Id', 'Description', 'Status', 'email', 'reset_token'], 'safe'],
      [['User_ID', 'Category'], 'integer'],
      [['Username', 'Password', 'Description', 'Status', 'Role_Id'], 'string'],
      [['email'], 'string', 'max' => 255],
      [['reset_token'], 'string', 'max' => 200],
      [['User_ID'], 'unique'],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function attributeLabels()
  {
    return [
      'User_ID' => 'User ID',
      'Username' => 'Username',
      'Password' => 'Password',
      'Role_Id' => 'Role ID',
      'Category' => 'Category',
      'Description' => 'Description',
      'Status' => 'Status',
      'email' => 'Email',
      'reset_token' => 'Reset Token',
    ];
  }


  /**
   * {@inheritdoc}
   */

  public static function findIdentity($id)
  {
    return self::find()->where(['User_ID' => $id])->one();
  }

  /**
   * {@inheritdoc}
   */
  public static function findIdentityByAccessToken($token, $type = null)
  {
    return null;
  }

  /**
   * Finds user by username
   *
   * @param string $username
   * @return static|null
   */
  public static function findByUsername($username)
  {
    return self::find()->where(['Username' => $username])->one();
  }


  public static function findByEmail($email)
  {
    return self::find()->where(['email' => $email])->one();
  }

  public static function findByResetToken($token)
  {
    if($token != '' && $token){
      return self::find()->where(['reset_token' => $token])->one();
    }
  }

  /**
   * {@inheritdoc}
   */
  public function getId()
  {
    return $this->User_ID;
  }

  /**
   * {@inheritdoc}
   */
  public function getAuthKey()
  {
    return null;
  }

  /**
   * {@inheritdoc}
   */
  public function validateAuthKey($authKey)
  {
    return null;
  }



  /**
   * Validates password
   *
   * @param string $password password to validate
   * @return bool if password provided is valid for current user
   */
  public function validatePassword($password)
  {
    return $this->Password === md5($password);
  }

  public function getRoleName(){
    if($this->Role_Id == 1){
      return  'System Admin';
    }
    elseif($this->Role_Id == 2){
      return  'Hospital Admin';
    }
    elseif($this->Role_Id == 3){
      return  'Hospitl Employee';
    }else{
      return  $this->Role_Id;
    }
  }

  public function getDropDown(){
    $user = Yii::$app->user->identity;
    $dropDown = [];
    if($user){
      if($user->Role_Id == 1){
        $dropDown = ['2' => 'Hospital Admin'];
      }else if($user->Role_Id == 2){
        $dropDown = ['3' => 'Hospital employee'];
      }
    }
    return $dropDown;
  }
}
