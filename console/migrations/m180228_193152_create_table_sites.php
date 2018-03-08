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
        $this->createTable('{{%sites}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'url' => $this->string(),
            'status' => $this->integer(),
            'statistic_url' => $this->string(),
            'statistic_pass' => $this->string(),
            'confirm_status' => $this->boolean(),
            'ban_msg' => $this->string(),
            'created_at' => $this->timestamp()->defaultValue(new \yii\db\Expression('NOW()')),
            'updated_at' => $this->timestamp()->null(),
            'deleted' => $this->boolean()->defaultValue(false)
        ]);
        $this->createIndex('i-sites', '{{%sites}}', ['url', 'status', 'confirm_status'], false);
        $this->addForeignKey('fk-site-user', '{{%sites}}', 'user_id', '{{%users}}', 'id', 'RESTRICT', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%sites}}');
    }
}
