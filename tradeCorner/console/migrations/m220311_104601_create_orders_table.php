<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%orders}}`.
 */
class m220311_104601_create_orders_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%orders}}', [
            'order_id' => $this->primaryKey(),
            'total_price' => $this->decimal(10,2)->notNull(),
            'status' => $this->integer(2)->notNull(),
            'firstname' => $this->string(80)->notNull(),
            'lastname' => $this->string(80)->notNull(),
            'email' => $this->string(255)->notNull(),
            'transaction_id' => $this->string(50)->notNull(),
            'created_at' => $this->datetime()->notNull(),
            'created_by' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%orders}}');
    }
}
