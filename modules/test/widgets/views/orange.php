<?php

use yii\helpers\Url;
use yii\web\View;

/** @var View $this */
/** @var array $orangeArray */
?>

    <h1>Orange Widget</h1>
<?php foreach ($orangeArray as $orangeName => $url) :?>
    <a href="<?= Url::to($url)?>"><?= $orangeName?></a> <br>
<?php endforeach;?>