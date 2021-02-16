<?php

namespace app\components\widget;

use app\models\Genre;
use yii\base\Widget;

class BookGenreMenuWidget extends Widget
{
    public function run()
    {
        /** @var Genre $genres */
        $genres = Genre::find()
            ->with('books')
            ->all();

        return $this->render('book-genre-menu', [
                'genres' => $genres,
            ]
        );
    }
}