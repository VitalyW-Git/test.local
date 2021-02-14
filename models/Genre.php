<?php

namespace app\models;

use Yii;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "genre".
 *
 * @property int $id
 * @property string|null $name
 * @property Book[] $books
 *
 * @property BookGenre[] $bookGenres
 */
class Genre extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'genre';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[BookGenres]].
     *
     * @return ActiveQuery
     */
//    public function getBookGenres()
//    {
//        return $this->hasMany(BookGenre::class, ['id_genre' => 'id']);
//    }
    public function getBooks()
    {
        return $this->hasMany(Book::class, ['id' => 'id_book'])
            ->viaTable('book_genre', ['id_genre' => 'id']);
    }
}
