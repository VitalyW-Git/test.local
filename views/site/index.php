<?php

use app\components\widget\vue\VueAsset;

/* @var $this yii\web\View */

VueAsset::register($this);

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>
        <p class="lead">You have successfully created your Yii-powered application.</p>
        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>
    <div id="app"></div>
    <div id="lorem"></div>
</div>
