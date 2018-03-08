<?php

use yii\db\Migration;

/**
 * Class m180228_192815_create_table_cellular_operators
 */
class m180228_192815_create_table_cellular_operators extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%cellular_operators}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'ip_min' => $this->string(),
            'ip_max' => $this->string(),
            'country_short' => $this->string('2'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%cellular_operators}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180228_192815_create_table_cellular_operators cannot be reverted.\n";

        return false;
    }
    */
}
