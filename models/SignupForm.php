<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\components\behaviors\SendEmailAfterSignUp;

/**
 * Signup form
 */
class SignupForm extends Model
{

    public $username;
    public $email;
    public $password;
    public function behaviors()
    {
        return [

            'afterValidate' => [
                'class' => SendEmailAfterSignUp::class,
                'email' => $this->email,
                'password' => $this->password,
            ]
        ];
    }
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => User::class, 'message' => 'Такой логин уже занят.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => User::class, 'message' => 'Пользователь с таким email уже существует'],
        ];
    }
    public function signup()
    {
        $this->password = Yii::$app->security->generateRandomString();

        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->password =  $this->password;
        $user->password_hash = Yii::$app->security->generatePasswordHash($this->password);
        //$user->generateAuthKey();
        return $user->save() ? $user : null;
    }
}
