<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order_articles}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%articles}}`
 * - `{{%orders}}`
 */
class m220311_105123_create_order_articles_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order_articles}}', [
            'id' => $this->primaryKey(),
            'article_name' => $this->string(255)->notNull(),
            'article_id' => $this->integer()->notNull(),
            'article_price' => $this->decimal(10,2),
            'order_id' => $this->integer()->notNull(),
            'quantity' => $this->integer()->notNull(),
        ]);

        // creates index for column `article_id`
        $this->createIndex(
            '{{%idx-order_articles-article_id}}',
            '{{%order_articles}}',
            'article_id'
        );

        // add foreign key for table `{{%article}}`
        $this->addForeignKey(
            '{{%fk-order_articles-article_id}}',
            '{{%order_articles}}',
            'article_id',
            '{{%articles}}',
            'article_id',
            'CASCADE'
        );

        // creates index for column `order_id`
        $this->createIndex(
            '{{%idx-order_articles-order_id}}',
            '{{%order_articles}}',
            'order_id'
        );

        // add foreign key for table `{{%orders}}`
        $this->addForeignKey(
            '{{%fk-order_articles-order_id}}',
            '{{%order_articles}}',
            'order_id',
            '{{%orders}}',
            'order_id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%article}}`
        $this->dropForeignKey(
            '{{%fk-order_articles-article_id}}',
            '{{%order_articles}}'
        );

        // drops index for column `article_id`
        $this->dropIndex(
            '{{%idx-order_articles-article_id}}',
            '{{%order_articles}}'
        );

        // drops foreign key for table `{{%orders}}`
        $this->dropForeignKey(
            '{{%fk-order_articles-order_id}}',
            '{{%order_articles}}'
        );

        // drops index for column `order_id`
        $this->dropIndex(
            '{{%idx-order_articles-order_id}}',
            '{{%order_articles}}'
        );

        $this->dropTable('{{%order_articles}}');
    }
}
