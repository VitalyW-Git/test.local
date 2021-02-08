<?php

use app\models\Player;
use yii\web\View;

/** @var View $this */
/** @var string $message */
/** @var string $descr */
/** @var Player[] $players */
?>

<h1>Hello</h1>

<p><?= $message ?></p>

<p><?= $descr ?></p>

<?php foreach ($players as $player) { ?>
<ul>
    <li>
        <?= $player->name ?>
    </li>
    <li>
        <?= $player->age ?>
    </li>
    <hr>
</ul>
<? } ?>

