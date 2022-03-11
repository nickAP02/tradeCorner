<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%user}}`.
 */
class m220311_013442_add_telephone_code_column_phone_number_column_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'telephone_code', $this->string()->notNull());
        $this->addColumn('{{%user}}', 'phone_number', $this->integer()->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%user}}', 'telephone_code');
        $this->dropColumn('{{%user}}', 'phone_number');
    }
}
