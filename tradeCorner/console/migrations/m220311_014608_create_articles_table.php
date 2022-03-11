<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%articles}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%articles}}`
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m220311_014608_create_articles_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%articles}}', [
            'article_id' => $this->primaryKey(),
            'article_name' => $this->string(255)->notNull(),
            'description' => $this->text(),
            'image' => $this->string(2000),
            'price' => $this->decimal(10,2)->notNull(),
            'status' => $this->integer(2)->notNull(),
            'created_at' => $this->datetime(),
            'updated_at' => $this->datetime(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ]);

        // creates index for column `article_id`
        $this->createIndex(
            '{{%idx-articles-article_id}}',
            '{{%articles}}',
            'article_id'
        );

        // add foreign key for table `{{%article_id}}`
        /*$this->addForeignKey(
            '{{%fk-articles-article_id}}',
            '{{%articles}}',
            'article_id',
            '{{%articles}}',
            'article_id',
            'CASCADE'
        );*/

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-articles-created_by}}',
            '{{%articles}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-articles-created_by}}',
            '{{%articles}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-articles-updated_by}}',
            '{{%articles}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-articles-updated_by}}',
            '{{%articles}}',
            'updated_by',
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
        // drops foreign key for table `{{%article_id}}`
        $this->dropForeignKey(
            '{{%fk-articles-article_id}}',
            '{{%articles}}'
        );

        // drops index for column `article_id`
        $this->dropIndex(
            '{{%idx-articles-article_id}}',
            '{{%articles}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-articles-created_by}}',
            '{{%articles}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-articles-created_by}}',
            '{{%articles}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-articles-updated_by}}',
            '{{%articles}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-articles-updated_by}}',
            '{{%articles}}'
        );

        $this->dropTable('{{%articles}}');
    }
}
