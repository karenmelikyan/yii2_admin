<?php
namespace app\models;

use yii\base\Model;

class LoginForm extends Model
{
    public  $username;
    public  $password;
    public  $mail;
    private $user;

    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            ['password', 'validatePassword'],
        ];
    }

    public function validatePassword()
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError(null, 'Username or password is invalid');
            }
        }
    }


    public function login()
    {
        if (!$this->validate()) {
            return false;
        }

        $user = $this->getUser();

        if ($user) {
            return \Yii::$app->user->login($user);
        }

        return false;
    }

    /**
     * @return User|null
     */
    private function getUser()
    {
        if (!isset($this->user)) {
            $this->user = User::findOne(['username' => $this->username]);
        }

        return $this->user;
    }

}