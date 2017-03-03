<?php
/**
 * Created by PhpStorm.
 * User: Админ
 * Date: 01.03.2017
 * Time: 7:04
 */

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;


class BehaviorsController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'controllers' => ['main'],
                        'actions' => ['reg', 'login'],
                        'verbs' => ['GET', 'POST'],
                        'roles' =>['?']
                    ],
                    [
                        'allow' => true,
                        'controllers' => ['main'],
                        'actions' => ['logout'],
                        'verbs' => ['POST'],
                        'roles' =>['@']
                    ],
                ]
            ]
        ];
    }
}