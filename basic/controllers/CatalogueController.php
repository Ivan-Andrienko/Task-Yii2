<?php

namespace app\controllers;

use app\models\Catalogue;
use phpDocumentor\Reflection\Types\Null_;
use Yii;

class CatalogueController extends \yii\web\Controller
{
    public function actionCreate()
    {
        $model = new Catalogue();

        if($_POST['Catalogue']){
            $model->title = $_POST['Catalogue']['title'];
            $model->description = $_POST['Catalogue']['description'];

            if($model->validate() && $model->save()){
                
                return $this->redirect(['index']);
            }
        } 
        
        return $this->render('create', ['model' => $model]);
    }

    public function actionIndex()
    {
        $model = Catalogue::getAll();

        return $this->render('index', ['model' => $model]);
    }

    public function actionUpdate($id = 3)
    {
        $one = Catalogue::getOne($id);

        if($_POST['Catalogue']){
            $one->title = $_POST['Catalogue']['title'];
            $one->description = $_POST['Catalogue']['description'];

            if($one->validate() && $one->save()){
                return $this->redirect(['index']);
            }
        }
        
        return $this->render('update', ['one' => $one]);
    }

    public function actionDelete($id = 6)
    {
        $model = Catalogue::getOne($id);

        if($model != null){
            
            $model->delete();
            
            return $this->redirect(['index']);
        }
        
        Yii::error('Ошибка при удалении');
        
        return $this->refresh();
    }
    
    public function actionForuser()
    {
        $model = Catalogue::getAll();
        
        if($_POST['Catalogue']){
            
        }
        
        return $this->render('foruser', ['model' => $model]);
    }
}
