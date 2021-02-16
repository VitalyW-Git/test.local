<?php

use app\components\widget\BookGenreMenuWidget;
use app\components\widget\BooksWidget;
use app\models\Book;

/** @var View $this */
/** @var Book[] $books */

?>
<div class="row">
    <div class="col-md-4">
        <?= BookGenreMenuWidget::widget()?>
    </div>
    <div class="col-md-8">
        <div class="body-content">
            <h1>Main page</h1>
            <?= BooksWidget::widget(['books' => $books])?>
        </div>
    </div>
</div>



