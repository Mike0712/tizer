<?php

use yii\db\Migration;

/**
 * Class m180228_192921_create_table_paylog
 */
class m180228_192921_create_table_paylog extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%paylog}}',[
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'type_id' => $this->integer(),
            'status' => $this->integer(),
            'order_date' => $this->dateTime(),
            'confirm_date' => $this->dateTime(),
            'details' => $this->string(),
            'sum' => $this->integer(),
        ]);
        $this->addForeignKey('fk-paylog-user', '{{%paylog}}', 'user_id', '{{%users}}', 'id', 'RESTRICT', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%paylog}}');
    }
}
