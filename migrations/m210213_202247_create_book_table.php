<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%book}}`.
 */
class m210213_202247_create_book_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%book}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(30),
            'author' => $this->string(30),
            'images' => $this->string(30),
            'year' => $this->integer(30),
            'description' => $this->string(500),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%book}}');
    }
}
