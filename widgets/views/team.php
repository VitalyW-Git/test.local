<?php
use app\models\Team;
use yii\web\View;

/** @var View $this */
/** @var Team $teams */
?>

<?php foreach ($teams as $team) { ?>
    <ul>
        <li>
            <?= $team->name ?>
        </li>
    </ul>
<? } ?>