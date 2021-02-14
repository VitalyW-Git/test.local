<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%book_genre}}`.
 */
class m210213_202423_create_book_genre_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%book_genre}}', [
            'id' => $this->primaryKey(),
            'id_book' => $this->integer(),
            'id_genre' => $this->integer(),
        ]);

        $this->addForeignKey('fk_book_id',
            'book_genre',
            'id_book',
            'book',
            'id',
            'cascade',
            'cascade');

        $this->addForeignKey('fk_genre_id',
            'book_genre',
            'id_genre',
            'genre',
            'id',
            'cascade',
            'cascade');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%book_genre}}');
    }
}
