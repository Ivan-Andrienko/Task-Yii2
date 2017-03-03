<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RegForm */
/* @var $form ActiveForm */
?>
<!-- main-reg -->
<div class="row main-reg">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'username') ?>
        <?= $form->field($model, 'email') ?>
        <?= $form->field($model, 'password') -> passwordInput() ?>

        <div class="form-group">
            <?= Html::submitButton('Регистрация', ['class' => 'btn btn-default btn-md']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
    <div class="col-md-3"></div>
</div>
