<?php


namespace app\controllers;


use app\models\Book;
use app\models\Genre;
use yii\base\Controller;

class BookController extends Controller
{
    public function actionIndex()
    {
//        $genres = Book::find()->one()->getBookGenres()->with('genre')->with('book')->asArray()->all();

//        $id = \Yii::$app->request->get('id');
        $model10 = Book::find()
            ->select('book.*')
            ->leftJoin('book_genre', '`book_genre`.`id_book` = `book`.`id`')
//            ->where(['book.id' => $id])
            ->with('genres')
            ->all();

        /** @var Genre $genres */
        $genres = Genre::find()
            ->with('books')
            ->all();

        /** @var Book $books */
        $books = Book::find()
            ->with('genres')
            ->all();

//        debug($model10);die();
        return $this->render('index', [
            'genres' => $genres,
            'books' => $books,
            ]
        );
    }

//    public function actionBook($id)
//    {
//        \Yii::$app->request
//        $books = Book::find()
//            ->select('book.*')
//            ->leftJoin('book_genre', '`book_genre`.`id_book` = `book`.`id`')
//            ->where(['book.id' => $id])
//            ->with('genres')
//            ->all();
//    }

}