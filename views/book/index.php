<?php

use app\models\Book;
use app\models\Genre;
use yii\helpers\Html;

/** @var Book[] $books */
/** @var Genre[] $genres */
?>
<div class="row">
    <div class="col-md-4">
        <div class="list-group">
            <a href="#" class="list-group-item active">
                Жанры
            </a>
            <?php
            /** @var Genre $genre */
            foreach ($genres as $genre) : ?>
                <a href="#" class="list-group-item">
                    <?= Html::a(
                        $genre->name,
                        ['book/book', 'id' => $genre->id],
                        ['class' => 'btn btn-primary']
                    ) ?>
                </a>
            <? endforeach; ?>
        </div>
    </div>
    <div class="col-md-8">
        <div class="body-content">
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
        </div>
    </div>
</div>



