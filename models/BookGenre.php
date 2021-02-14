<?php

namespace app\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "book_genre".
 *
 * @property int $id
 * @property int|null $id_book
 * @property int|null $id_genre
 *
 * @property Book $book
 * @property Genre $genre
 */
class BookGenre extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'book_genre';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_book', 'id_genre'], 'integer'],
            [['id_book'], 'exist', 'skipOnError' => true, 'targetClass' => Book::class, 'targetAttribute' => ['id_book' => 'id']],
            [['id_genre'], 'exist', 'skipOnError' => true, 'targetClass' => Genre::class, 'targetAttribute' => ['id_genre' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_book' => 'Id Book',
            'id_genre' => 'Id Genre',
        ];
    }

    /**
     * Gets query for [[Book]].
     *
     * @return ActiveQuery
     */
    public function getBook()
    {
        return $this->hasOne(Book::class, ['id' => 'id_book']);
    }

    /**
     * Gets query for [[Genre]].
     *
     * @return ActiveQuery
     */
    public function getGenre()
    {
        return $this->hasOne(Genre::class, ['id' => 'id_genre']);
    }

}
