<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LoginForm */
/* @var $form ActiveForm */
?>
<!-- main-login -->
<div class="row main-login">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'username') ?>
            <?= $form->field($model, 'password') -> passwordInput() ?>
            <?= $form->field($model, 'rememberMe') -> checkbox() ?>
    
            <div class="form-group">
                <?= Html::submitButton('Войти', ['class' => 'btn btn-default btn-md']) ?>
            </div>
        
        <?php ActiveForm::end(); ?>
    </div>
    <div class="col-md-3"></div>
</div>
