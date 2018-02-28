<?php

use yii\db\Migration;

/**
 * Class m180228_193012_create_table_ref_stats
 */
class m180228_193012_create_table_ref_stats extends Migration
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
        echo "m180228_193012_create_table_ref_stats cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180228_193012_create_table_ref_stats cannot be reverted.\n";

        return false;
    }
    */
}
