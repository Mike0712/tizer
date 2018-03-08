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
        $this->createTable('{{%ticket_messages}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'ticket_id' => $this->integer(),
            'message' => $this->text(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
        ]);
        $this->addForeignKey('fk-ticket_message-user', '{{%ticket_messages}}', 'user_id', '{{%users}}', 'id', 'RESTRICT', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%ticket_messages}}');
    }
}
