<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => [
            'id'=>'navid',
            'class' => 'navbar-nav',
            'style'=>'float: left; font-size: 16px;',
            'data'=>'menu',
        ],
        'items' => [
//            ['label' => 'Home', 'url' => ['/site/index']],
//            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Article', 'url' => ['/article/create']],
            ['label' => 'Book', 'url' => ['/book/index']],
            ['label' => 'Crypto ', 'url' => ['/crypto/index']],
            ['label' => 'User', 'url' => ['/user/']],
            ['label' => 'Catalog', 'url' => ['/catalog/']],
            ['label' => 'Search', 'url' => ['/user/search']],
            ['label' => 'Team', 'url' => ['/team']],
            ['label' => 'Hello', 'url' => ['/test/default/']],
            ['label' => 'Gangster, Mandarin',
                'url' => ['/user/search'],
                'options'=>['class'=>'dropdown'],
                'template' => '<a href="{url}" class="url-class">{label}</a>',
                'items' => [
                    ['label' => 'Gangster', 'url' => ['/gangster']],
                    ['label' => 'Mandarin', 'url' => ['/test/default/mandarin']],
                ]
            ],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],


    ]);


    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
