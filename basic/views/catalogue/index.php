<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<h3>Список задач.</h3><br>

<a href="index.php?r=catalogue%2Fcreate" class="btn btn-default">Новая задача</a><br><br>
<!--<a href="basic/views/catalogue/create.php" class="btn btn-default">Новая задача</a><br><br>-->

<table class="table">
    <thead>
        <tr>
            <td>Название</td>
            <td>Описание</td>
            <td>Состояние</td>
            <td>Изменить / Удалить</td>
        </tr>
    </thead>

    <tbody>
        <?php foreach($model as $item): ?>
            <tr>
                <td><?= $item->title ?></td>
                <td><?= $item->description ?></td>
                <td>
                    <?php $form = ActiveForm::begin(); ?>
                        <?= $form->field($item, 'done')->checkbox(); ?>
                    <?php $form = ActiveForm::end(); ?>
                </td>
                <td>
                    <!--<a href="/catalogue/update/--><?//= $item->id?><!--">Редактировать</a>-->
                    <a href="index.php?r=catalogue%2Fupdate">Редактировать</a>
                    |
                    <!--<a href="/catalogue/delete/--><?//= $item->id?><!--">Удалить</a>-->
                    <a href="index.php?r=catalogue%2Fdelete">Удалить</a>
                </td>
            </tr>
        <?php endforeach?>
    </tbody>
</table>
