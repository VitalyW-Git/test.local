<?php

use yii\db\Migration;

/**
 * Class m210304_190238_create_image_tables
 */
class m210304_190238_create_image_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user', 'image', 'string');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('user', 'image');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210304_190238_create_image_tables cannot be reverted.\n";

        return false;
    }
    */
}
