<?php

use yii\db\Migration;

/**
 * Class m180228_192453_create_table_online
 */
class m180228_192453_create_table_online extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%users_online}}',[
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'last_visit' => $this->dateTime(),
        ]);
        $this->addForeignKey('fk-online-user', '{{%users_online}}', 'user_id', '{{%users}}', 'id', 'RESTRICT', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%users_online}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180228_192453_create_table_online cannot be reverted.\n";

        return false;
    }
    */
}
