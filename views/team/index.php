
<?php
use app\models\Team;
use \app\models\Player;

/** @var Team[] $teams */

?>

<?php

foreach ($teams as $command){
?>
    <ul>
        <li><?=$command->name?></li>
    </ul>

    <?php
    /** @var Player[] $players */
    $players = $command->players ?>

    <?php foreach ($players as $player){ ?>
        <p><?=$player->name ?></p>
    <? } ?>
<?php
}
?>