<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%cart_articles}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%articles}}`
 * - `{{%user}}`
 */
class m220311_110843_create_cart_articles_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%cart_articles}}', [
            'id' => $this->primaryKey(),
            'article_id' => $this->integer()->notNull(),
            'quantity' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `article_id`
        $this->createIndex(
            '{{%idx-cart_articles-article_id}}',
            '{{%cart_articles}}',
            'article_id'
        );

        // add foreign key for table `{{%articles}}`
        $this->addForeignKey(
            '{{%fk-cart_articles-article_id}}',
            '{{%cart_articles}}',
            'article_id',
            '{{%articles}}',
            'article_id',
            'CASCADE'
        );

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-cart_articles-user_id}}',
            '{{%cart_articles}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-cart_articles-user_id}}',
            '{{%cart_articles}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%articles}}`
        $this->dropForeignKey(
            '{{%fk-cart_articles-article_id}}',
            '{{%cart_articles}}'
        );

        // drops index for column `article_id`
        $this->dropIndex(
            '{{%idx-cart_articles-article_id}}',
            '{{%cart_articles}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-cart_articles-user_id}}',
            '{{%cart_articles}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-cart_articles-user_id}}',
            '{{%cart_articles}}'
        );

        $this->dropTable('{{%cart_articles}}');
    }
}
