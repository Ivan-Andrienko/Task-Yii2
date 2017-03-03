<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<h3>Создание нового задания</h3><br>

<?php $form = ActiveForm::begin(); ?>
    <div class="row">
        
        <div class="col-md-4">
            <?= $form->field($model, 'title')->textInput() ?>
        </div>
        
        <div class="col-md-8">
            <?= $form->field($model, 'description')->textInput() ?>
        </div>
        
        <div class="col-md-12">
            <?= Html::submitButton('Создать', ['class' => 'btn btn-default btn-md']) ?>
        </div>
        
    </div>
<?php $form = ActiveForm::end(); ?>
