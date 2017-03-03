<?php
/**
 * Created by PhpStorm.
 * User: Админ
 * Date: 28.02.2017
 * Time: 14:05
 */
namespace app\models;

use yii\base\Model;
use Yii;

class LoginForm extends Model
{
    public $username;
    public $password;
    public $email;
    public $rememberMe = true;
    public $status;
    private $_user = false;

    public function rules()
    {
        return [
            [['username', 'password'], 'required', 'on' => 'default'],
            ['email', 'email'],
            ['rememberMe', 'boolean'],
            ['password', 'validatePassword']
        ];
    }

    public function validatePassword($attribute)
    {
        if(!$this->hasErrors()):
            $user = $this->getUser();
            
            if(!$user || !$user->validatePassword($this->password)):
                $this->addError($attribute, 'Не правильное имя пользователя или пароля.');
            endif;
        
        endif;
    }

    public function getUser()
    {
        if($this->_user === false):
            $this->_user = Users::findByUsername($this->username);
        endif;
        
        return $this->_user;
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Имя пользователя',
            'password' => 'Пароль',
            'rememberMe' => 'Запомнить меня'
        ];
    }

    public function login()
    {
        if ($this->validate()):
            
            $this->status = ($user = $this->getUser()) ? $user->status : Users::STATUS_NOT_ACTIVE;

            if($this->status === Users::STATUS_ACTIVE || $this->status === Users::STATUS_MANAGER):
                
                return Yii::$app->user->login($user, $this->rememberMe ? 3600*24*30 : 0);
            
            else:
                
                return false;
                
            endif;
        else:
            
            return false;
            
        endif;
    }
}