<?php

use app\models\Gangster;
use yii\helpers\Url;
use yii\web\View;

/** @var View $this */
/** @var Gangster $gangster */

?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"> <b><?= $gangster->name?> </b> </h3>
    </div>
    <div class="panel-body">
        <ul>
            <li>
                Статус:
                <span id="js-update-status-<?= $gangster->id ?>"
                      data-js-update-status="<?= $gangster->status ?>"
                >
                    <?= $gangster->status ?>
                </span>
            </li>
            <li>Возраст: <?= $gangster->age ?></li>
        </ul>
    </div>

    <div class="panel-footer">
        <div class="cards-margin">
            <a class="btn btn-success" href="<?= Url::toRoute(['gangster/view', 'id' => $gangster->id]) ?>">Подробнее</a>

            <?php /*
            <a class="btn btn-danger js-status-gangster" data-gangster-id="<?= $gangster->id ?>"
               href="<?= Url::toRoute(['gangster/status', 'id' => $gangster->id]) ?>">Изменить татус</a>
            */ ?>

            <a class="btn btn-warning js-change-gangster" data-update-gangster-id="<?= $gangster->id ?>"
               href="#">Изменить данные
            </a>
        </div>
    </div>
</div>



















<?php /*
<div id="js-update-gangster-status-<?= $gangster->id ?>" class="col-sm-6"
     data-update-block-gangster-id="<?= $gangster->id ?>">
    <div class="card bg-primary cards-block mb-3">
        <div class="card-body cards-margin">
            <h3 class="card-title"><?= $gangster->name ?></h3>
        </div>
        <div class="panel-body">
            <p>Возраст: <?= $gangster->age ?></p>
            <p>

            </p>
            <?php
            // @var Gun $gun
            $gun = $gangster->gun; ?>
            <p>Оружие: <?= $gun->gun ?></p>
        </div>

    </div>
</div>
 */ ?>
