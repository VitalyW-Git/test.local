<?php

use yii\base\View;
use app\models\User;

/** @var User[] $users */
/** @var View $this */

?>

<?php foreach ($users as $user) :?>
    <ul>
        <li><?= $user->id ?> <?= $user->name ?> <?= $user->age ?></li>
    </ul>
<?php endforeach; ?>


