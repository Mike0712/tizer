<?php

use yii\db\Migration;

/**
 * Class m180228_193426_create_table_tickets
 */
class m180228_193426_create_table_tickets extends Migration
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
        echo "m180228_193426_create_table_tickets cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180228_193426_create_table_tickets cannot be reverted.\n";

        return false;
    }
    */
}
