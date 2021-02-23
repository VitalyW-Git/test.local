<?php

use app\models\Genre;
use yii\helpers\Html;
use yii\web\View;

/** @var View $this */
/** @var Genre $genres */

?>

<div class="list-group">
        <?= Html::a('Жанры', ['/book'], ['class' => 'list-group-item active']) ?>
    <?php
    /** @var Genre $genre */
    foreach ($genres as $genre) : ?>
<!--            --><?//= Html::a($genre->name, ['/book/genre', 'id'=>$genre->id], ['class' => 'list-group-item']) ?>
<!--       берёт значения адреса из config urlManager -->
        <a href="<?= Yii::$app->urlManager->createUrl(['/book/genre', 'id' => $genre->id])?>" class="list-group-item">
            <?= $genre->name ?>
        </a>
    <? endforeach; ?>
</div>
