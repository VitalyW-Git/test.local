<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%car}}`.
 */
class m210205_092411_create_car_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%car}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'user_id' => $this->integer(),
        ]);
        $this->addForeignKey(
            '$fk_owner_id',
            'car',
            'user_id',
            'people',
            'id',
            'cascade',
            'cascade');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%car}}');
    }
}
