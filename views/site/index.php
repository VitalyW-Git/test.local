<?php

use app\components\widget\vue\VueWidget;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>
        <?= VueWidget::widget([
                'component' => 'new-component',
                'props' => ['text' => 'Стартовый текст!!'],
            ]) ?>
        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>
    <?= VueWidget::widget([
        'component' => 'new-component2',
        'props' => ['text' => 'Пробный текст для второго компонента'],
    ]) ?>
</div>
