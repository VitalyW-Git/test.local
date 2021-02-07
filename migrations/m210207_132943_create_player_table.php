<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%player}}`.
 */
class m210207_132943_create_player_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%player}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'age' => $this->integer(),
            'rating' => $this->integer(),
            'team_id' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%player}}');
    }
}
