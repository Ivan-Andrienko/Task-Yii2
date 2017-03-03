<?php

namespace app\controllers;

use Yii;
use app\models\RegForm;
use app\models\LoginForm;
use app\models\Users;

class MainController extends BehaviorsController
{
//    public $layout = 'main';

    public function actionIndex()
    {
        $hello  = 'Hello Word!!!';
        return $this->render(
            'index.php?r=main%2Findex',
            [
                'hello' => $hello
            ]
        );
    }

    public function actionReg()
    {
        $model = new RegForm();

        if($model->load(Yii::$app->request->post()) && $model->validate()):
            if ($user = $model->reg()):
                if($user->status === Users::STATUS_ACTIVE || $user->status === Users::STATUS_MANAGER):
                    if(Yii::$app->getUser()->login($user)):
                        if(Yii::$app->user->identity['status'] == Users::STATUS_ACTIVE):
                            return $this->redirect('index.php?r=catalogue%2Fforuser');
                            
                        elseif(Yii::$app->user->identity['status'] == Users::STATUS_MANAGER):
                            return $this->redirect('index.php?r=catalogue%2Findex');
    //                        return $this->redirect('/views/catalogue/index');
    //                        return $this->redirect('index.php?r=main%2Findex');
    //                        return $this->goHome();
                        endif;  
                    endif;
                endif;
            else:
                Yii::$app->session->setFlash('error', 'Возникла ошибка при регистрации');
                Yii::error('Ошибка при регистрации');
                return $this->refresh();
            endif;
        endif;

        return $this->render(
          'reg',
            ['model' => $model]
        );
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->redirect(['index.php?r=main%2Findex']);
    }

    public function actionLogin()
    {
        if(!Yii::$app->user->isGuest):
            return $this->goHome();
        endif;
        
        $model = new LoginForm();

        if($model->load(Yii::$app->request->post()) && $model->login()):

//            return $this->redirect('index.php?r=catalogue%2Findex');
//           return $this->goBack();
            if(Yii::$app->user->identity['status'] == Users::STATUS_ACTIVE):
//                echo '10';
                return $this->redirect('index.php?r=catalogue%2Fforuser');

            elseif(Yii::$app->user->identity['status'] == 20):
//                echo '20';
                return $this->redirect('index.php?r=catalogue%2Findex');
                //                        return $this->redirect('/views/catalogue/index');
                //                        return $this->redirect('index.php?r=main%2Findex');
                //                        return $this->goHome();
            endif;
        endif;

        return $this->render(
            'login',
            ['model' => $model]
        );
    }
}
