<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%gangster}}`.
 */
class m210210_061952_create_gangster_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%gangster}}', [
            'id' => $this->primaryKey(),
            'age' => $this->integer(),
            'name' => $this->string(),
            'status' => $this->integer(),
            'created_at' => 'timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'updated_at' => 'timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP'
        ]);

        $this->createTable('{{%gun}}', [
            'id' => $this->primaryKey(),
            'gangster_id' => $this->integer()->unique(),
            'gun' => $this->string(),
            'created_at' => 'timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'updated_at' => 'timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP'
        ]);

        $this->addForeignKey('fk_gangster_id',
            'gun',
            'gangster_id',
            'gangster',
            'id',
            'cascade',
            'cascade');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_gangster_id', 'gun');
        $this->dropTable('{{%gun}}');
        $this->dropTable('{{%gangster}}');
    }
}
