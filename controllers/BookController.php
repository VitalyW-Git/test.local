<?php


namespace app\controllers;


use app\models\Book;
use app\models\Genre;
use Yii;
use yii\base\Controller;
use yii\db\Query;

class BookController extends Controller
{
    /**
     * Страница просмотра всех книг всех жанров
     *
     * @return string
     */
    public function actionIndex()
    {
//        /** @var Genre $genres */
//        $genres = Genre::find()
//            ->with('books')
//            ->all();

        /** @var Book $books */
        $books = Book::find()
            ->with('genres')
            ->all();

        return $this->render('index', [
//            'genres' => $genres,
            'books' => $books,
            ]
        );
    }

    /**
     * @return string
     */
    public function actionGenre()
    {
        $id = Yii::$app->request->get('id');

        $books = Book::find()
            ->joinWith('bookGenres as bg')
            ->where(['bg.id_genre' => $id])
            ->all();

        return $this->render('genre', ['books' => $books]);
    }

}