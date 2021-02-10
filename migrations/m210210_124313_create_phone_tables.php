<?php

use yii\db\Migration;

/**
 * Class m210210_124313_create_phone_tables
 */
class m210210_124313_create_phone_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user', 'phone', 'string');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('user', 'phone');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210210_124313_create_phone_tables cannot be reverted.\n";

        return false;
    }
    */
}
