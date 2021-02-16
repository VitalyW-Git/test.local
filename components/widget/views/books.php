<?php

use app\models\Book;
use app\models\Genre;
use yii\web\View;

/** @var View $this */
/** @var Book[] $books */

?>

<div class="block-row">
<?php
    /** @var Book $book */
    foreach ($books as $book) : ?>

        <div class="block-item">
                <div class="card-body">
                    <span class="line"></span>
                    <h2 class="card-title"><?= $book->name; ?></h2>
                    <p>Автор: <?= $book->author; ?></p>
                    <p>Год издания: <?= $book->year; ?></p>
                    <?php
                    /** @var Genre $genres */
                    $genre = $book->genres;
                    foreach ($genre as $item) : ?>
                        <button type="button" class="btn btn-warning"><?= $item->name ?></button>
                    <? endforeach; ?>
                </div>

            </div>

    <? endforeach; ?>
</div>
