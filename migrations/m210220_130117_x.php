<?php

use yii\db\Migration;

/**
 * Class m210220_130117_x
 */
class m210220_130117_x extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%users}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'surname' => $this->string(),
            'patronymic' => $this->string(),
            'email' => $this->string()->unique()->notNull(),
            'created_at' => 'timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'updated_at' => 'timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP'
        ]);

        $this->createTable('{{%catalog}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'article' => $this->integer(),
            'alias' => $this->string(),
            'created_at' => 'timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'updated_at' => 'timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP'
        ]);

        $this->createTable('{{%catalog_order}}', [
            'id' => $this->primaryKey(),
            'total_price' => $this->integer(),
            'user_id' => $this->integer(),
            'total_count' => $this->integer(),
            'total_items_price' => $this->integer(),
            'user_name' => $this->string(),
            'user_surname' => $this->string(),
            'user_patronymic' => $this->string(),
            'user_email' => $this->string(),
            'user_phone' => $this->integer(),
            'user_city' => $this->string(),
            'created_at' => 'timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'updated_at' => 'timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP'
        ]);

        $this->createTable('{{%catalog_order_items}}', [
            'id' => $this->primaryKey(),
            'catalog_order_id' => $this->integer(),
            'catalog_id' => $this->integer(),
            'price' => $this->integer(),
            'price_stat' => $this->integer(),
            'quant' => $this->integer(),
            'pre_order' => $this->integer(),
            'created_at' => 'timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'updated_at' => 'timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP'
        ]);

        $this->addForeignKey('fk_catalog_order__user_id',
            'catalog_order',
            'user_id',
            'users',
            'id',
            'cascade',
            'cascade');

        $this->addForeignKey('fk_catalog_order_items__catalog_order_id',
            'catalog_order_items',
            'catalog_order_id',
            'catalog_order',
            'id',
            'cascade',
            'cascade');

        $this->addForeignKey('fk_catalog_order_items__catalog_id',
            'catalog_order_items',
            'catalog_id',
            'catalog',
            'id',
            'cascade',
            'cascade');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%catalog_order_items}}');
        $this->dropTable('{{%catalog_order}}');
        $this->dropTable('{{%catalog}}');
        $this->dropTable('{{%users}}');
    }
}
