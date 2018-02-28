<?php

use yii\db\Migration;

/**
 * Class m180228_193441_create_table_ticket_messages
 */
class m180228_193441_create_table_ticket_messages extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180228_193441_create_table_ticket_messages cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180228_193441_create_table_ticket_messages cannot be reverted.\n";

        return false;
    }
    */
}
