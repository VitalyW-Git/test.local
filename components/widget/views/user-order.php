<?php

use app\models\Gangster;
use app\models\User;
use app\models\UserOrder;
use yii\web\View;

/** @var View $this */
/** @var UserOrder $order */
/** @var User $user */
/** @var Gangster $gangster */

?>


<h3>Количенство order: <?= $order?></h3>
<h3>Количенство user: <?= $user?></h3>
<h3>Количенство gangster: <?= $gangster?></h3>