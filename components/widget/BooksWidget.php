<?php

namespace app\components\widget;

use app\models\Book;
use yii\base\Widget;

class BooksWidget extends Widget
{
    /** @var Book[] */
    public $books;

    public function run()
    {
        return $this->render('books', ['books' => $this->books]);
    }
}