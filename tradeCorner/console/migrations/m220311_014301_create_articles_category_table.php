<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%articles_category}}`.
 */
class m220311_014301_create_articles_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%articles_category}}', [
            'category_id' => $this->primaryKey(),
            'category_name' => $this->string(255)->notNull(),
            'description' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%articles_category}}');
    }
}
