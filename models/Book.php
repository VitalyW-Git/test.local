<?php

namespace app\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "book".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $year
 * @property Genre[] $genres
 *
 * @property BookGenre[] $bookGenres
 */
class Book extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'book';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['year'], 'integer'],
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
            'year' => 'Year',
        ];
    }

    /**
     * Gets query for [[BookGenres]].
     *
     * @return ActiveQuery
     */
//    public function getBookGenres()
//    {
//        return $this->hasMany(BookGenre::class, ['id_book' => 'id']);
//    }

    public function getGenres()
    {
        return $this->hasMany(Genre::class, ['id' => 'id_genre'])
            ->viaTable('book_genre', ['id_book' => 'id']);
    }
}
