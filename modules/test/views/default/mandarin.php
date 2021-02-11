<?php

use app\models\Gangster;
use app\modules\test\widgets\MandarinWidget;
use app\modules\test\widgets\OrangeWidget;
use yii\web\View;

/** @var Gangster[] $gangsters */
/** @var View $this */
?>

<?php
/** @var Gangster $gangster */
foreach ($gangsters as $gangster) : ?>
    <div class="panel panel-default">
        <div class="panel-heading">

            <h3 class="panel-title"><?= $gangster->name ?></h3>
        </div>
        <div class="panel-body">
            <p>Возраст: <?= $gangster->age ?></p>
            <p>Статус: <?= $gangster->status ?></p>

        </div>
    </div>
<? endforeach; ?>


<?= MandarinWidget::widget(
    ['mandarinList' => [
        'a' => ['/'],
        'b' => ['/site/contact'],
        'c' => ['/site/about'],
    ]]) ?>

<?= OrangeWidget::widget()?>


<!--<a href="--><? //= \yii\helpers\Url::to()?><!--">abc</a> <br>-->