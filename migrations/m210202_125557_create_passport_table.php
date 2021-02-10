<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%password}}`.
 */
class m210202_125557_create_passport_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%passport}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'number' => $this->integer(),
            'code' => $this->integer(),
            'address' => $this->string(),
            'city' => $this->string(),
            'created_at' => 'timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'updated_at' => 'timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP'
        ]);

        $this->addForeignKey('$fk_user_id',
         'passport',
        'user_id',
           'user',
           'id',
          'cascade',
        'cascade');
        }
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%passport}}');
    }
}
