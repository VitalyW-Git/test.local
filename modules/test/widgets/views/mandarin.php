<?php

use yii\helpers\Url;
use yii\web\View;

/** @var View $this */
/** @var array $mandarinList */
?>

    <h1>Mandarin Widget</h1>
<?php foreach ($mandarinList as $mandarinName => $url) :?>
    <a href="<?= Url::to($url)?>"><?= $mandarinName?></a> <br>
<?php endforeach;?>