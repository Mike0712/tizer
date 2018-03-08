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
        $this->createTable('{{%ticket}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'name' => $this->string(),
            'status' => $this->integer(),
            'date' => $this->dateTime(),
            'new' => $this->boolean()
        ]);
        $this->addForeignKey('fk-ticket-user', '{{%ticket}}', 'user_id', '{{%users}}', 'id', 'RESTRICT', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%ticket}}');
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
