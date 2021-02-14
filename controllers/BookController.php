<?php


namespace app\controllers;


use app\models\Book;
use app\models\Genre;
use yii\base\Controller;

class BookController extends Controller
{
    public function actionIndex()
    {
//        $genres = Genre::find()->one()->getBookGenres()->with('book')->with('genre')->all();
//        $genres = Book::find()->one()->getBookGenres()->with('genre')->with('book')->asArray()->all();
//        $genres = Book::find()->one()->getBookGenres()->with('genre')->with('book')->asArray()->all();

        /** @var Book $books */
        $books = Book::find()->with('genres')->all();

        /** @var Genre $genres */
        $genres = Genre::find()->with('books')->all();
//        $tags = $genres->getGenres();
//        debug($genres);die();
        return $this->render('book', [
            'books' => $books,
            'genres' => $genres
            ]
        );
    }
}