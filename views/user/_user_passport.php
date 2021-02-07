<?php

use app\models\User;
use \yii\web\View;

/** @var User $user */
/** @var View $this */


if ($user->passport): ?>
    <ul>
        <li>
            passport number <?= $user->passport->number?>
        </li>
        <li>
            passport code <?php echo $user->passport->code?>
        </li>
        <li>
            passport code <?php echo $user->passport->address?>
        </li>
    </ul>
<?php endif; ?>