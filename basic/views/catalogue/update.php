<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<h3>Редактирование задания</h3><br>

<?php $form = ActiveForm::begin(); ?>
<div class="row">
    <div class="col-md-4">
        <?= $form->field($one, 'title')->textInput() ?>
    </div>
    <div class="col-md-8">
        <?= $form->field($one, 'description')->textInput() ?>
    </div>
    <div class="col-md-12">
        <?= Html::submitButton('Изменить', ['class' => 'btn btn-default btn-md']) ?>
    </div>
</div>
<?php $form = ActiveForm::end(); ?>
