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

class RegForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $status;

    public function rules()
    {
        return [
            [['username', 'email', 'password'], 'filter', 'filter'=>'trim'],
            [['username', 'email', 'password'], 'required'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['password', 'string', 'min' => 3, 'max' => 255],
            ['username', 'unique', 'targetClass' => Users::className(),'message' => 'Это имя занято'],
            [ 'email', 'email'],
            ['email', 'unique', 'targetClass' => Users::className(),'message' => 'Эта эл.почта занята'],
            ['status', 'default', 'value' => Users::STATUS_ACTIVE, 'on' => 'default' ],

            ['status', 'in', 'range' => [
                Users::STATUS_NOT_ACTIVE,
                Users::STATUS_ACTIVE,
                Users::STATUS_MANAGER
            ]]
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Имя пользователя',
            'email' => 'Эл. почта',
             'password' => 'Пароль'
        ]; 
    }

    public function reg()
    {
        $user = new Users();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->status = $this->status;
        $user->setPassword($this->password);
        $user->generateAuthKey();

        return $user->save() ? $user : null;
    }
}