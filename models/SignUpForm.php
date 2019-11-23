<?php
namespace app\models;

use yii\base\Model;

class SignUpForm extends Model
{
    public $username;
    public $mail;
    public $password;
    public $confirmpassword;

    public function rules()
    {
        return [
            [['username', 'mail', 'password', 'confirmpassword'], 'required'],
            ['mail', 'email'],
            ['password', 'compare', 'compareAttribute' => 'confirmpassword'],
            ['mail', 'unique', 'targetClass' => User::class, 'targetAttribute' => 'mail'],
            ['username', 'unique', 'targetClass' => User::class, 'targetAttribute' => 'username'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'mail' => 'Email',
            'confirmpassword' => 'Confirm Password',
        ];
    }

    public function signup()
   {
       if (!$this->validate()) {
           return false;
       }

       $user = new User();

       $user->username = $this->username;
       $user->mail     = $this->mail;
       $user->password = \Yii::$app->getSecurity()->generatePasswordHash($this->password);

       return $user->save();
   }
}