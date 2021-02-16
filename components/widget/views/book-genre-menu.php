<?php

use app\models\Genre;
use yii\helpers\Html;
use yii\web\View;

/** @var View $this */
/** @var Genre $genres */

?>

<div class="list-group">
    <a href="#" class="list-group-item active">
        Жанры
    </a>
    <?php
    /** @var Genre $genre */
    foreach ($genres as $genre) : ?>
            <?= Html::a(
                $genre->name,
                ['/book/genre', 'id'=>$genre->id],
                ['class' => 'list-group-item']
            ) ?>
    <? endforeach; ?>
</div>
