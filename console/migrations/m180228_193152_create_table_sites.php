<?php

use yii\db\Migration;

/**
 * Class m180228_193152_create_table_sites
 */
class m180228_193152_create_table_sites extends Migration
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
        echo "m180228_193152_create_table_sites cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180228_193152_create_table_sites cannot be reverted.\n";

        return false;
    }
    */
}
