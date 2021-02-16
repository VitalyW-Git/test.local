<?php

use app\models\Book;
use app\models\Genre;
use yii\web\View;

/** @var View $this */
/** @var Book[] $books */

?>

<div class="row">
    <div class="card">
        <?php
        /** @var Book $book */
        foreach ($books as $book) : ?>
            <div class="card-body">
                <h2 class="card-title"><?= $book->name; ?></h2>
                <?php
                /** @var Genre $genres */
                $genre = $book->genres;
                foreach ($genre as $item) : ?>
                    <button type="button" class="btn btn-success"><?= $item->name ?></button>
                <? endforeach; ?>
            </div>
        <? endforeach; ?>
    </div>
</div>
