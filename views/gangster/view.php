<?php

use app\models\Gangster;
use yii\base\View;
use yii\helpers\Url;

/** @var Gangster $gangster */
/** @var View $this */

?>

<div class="col-cm-3">
        <h2>Оружие: <?= $gangster->gun->gun; ?></h2>
</div>
<div class="container">
    <div class="row">
        <a class="btn btn-warning" href="<?= Url::toRoute(['gangster/']) ?>">Назад</a>
    </div>
</div>

