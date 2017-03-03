<?php
use app\assets\AppAsset;
/**
 * Created by PhpStorm.
 * User: Админ
 * Date: 27.02.2017
 * Time: 18:15
 */
/* @var $content string*/
/* @var $this \yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\bootstrap\Modal;
use yii\widgets\Breadcrumbs;

AppAsset::register($this);
?>

<?php $this->beginPage() ?>
<!doctype html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <?= Html::csrfMetaTags() ?>
    <meta charset="<?= Yii::$app->charset ?>">
    <?php $this->registerMetaTag(['name'=>'viewport', 'content'=>'width=device-width, initial-scale=1']);?>
    <title><?= Yii::$app->name ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody(); ?>
<div class="wrap">
    <?php
        NavBar::begin([
//            'brandLabel' => 'Test task Yii2',
//            'brandUrl' => 'index.php?r=main%2Findex',
            'options' => [
                'class' => 'navbar-default navbar-fixed-top',
            ],
        ]);

        $menuItems = [];

        if(Yii::$app->user->isGuest):
            $menuItems[] = ['label' => 'Главная <span class="glyphicon glyphicon-home"></span>','url' => ['main/index']];
            $menuItems[] = ['label' => 'Регистрация', 'url' => ['/main/reg']];
            $menuItems[] = ['label' => 'Войти','url' => ['/main/login']];
        else:
            $menuItems[] = ['label' => 'Выйти('.Yii::$app->user->identity['username'].')',
                            'url' => ['/main/logout'],
                            'linkOptions' => ['data-method' => 'post']
                            ];
        endif;

        echo Nav::widget([
            'items'=> $menuItems,
                'activateParents' => true,
                'encodeLabels' => false,
                'options' => [
                    'class' => 'navbar-nav navbar-default navbar-right'
                ]
        ]);

        NavBar::end();
    ?>

    <div class="container">

        <?= $content ?>

    </div>

</div>
<footer class="footer">
    <div class="container">
        <span class="badge">
            <span class="glyphicon glyphicon-copyright-mark"></span> ;-) <?= date('Y') ?>
        </span>
    </div>
</footer>

<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage() ?>
