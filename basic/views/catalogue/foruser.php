<?php
/**
 * Created by PhpStorm.
 * User: Админ
 * Date: 02.03.2017
 * Time: 13:27
 */
use yii\widgets\ActiveForm;
?>
<h3>Список задач.</h3><br>

<!--<a href="#" class="btn btn-default">Применить изменения</a><br><br>-->

<table class="table">
    <thead>
        <tr>
            <td>Название</td>
            <td>Описание</td>
            <td>Состояние</td>
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
            </tr>
        <?php endforeach?>
    </tbody>
</table>