<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%detail}}`.
 */
class m210306_224456_create_article_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%article}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->comment('Название'),
            'content' => $this->string()->notNull()->comment('Описание'),
            'detail_picture' => $this->string(255)->comment('Изображение'),
            'preview_picture' => $this->string(255)->comment('Изображение предпросмотр'),
            'date_t' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%article}}');
    }
}
