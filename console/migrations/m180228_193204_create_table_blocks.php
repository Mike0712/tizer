<?php

use yii\db\Migration;

/**
 * Class m180228_193204_create_table_blocks
 */
class m180228_193204_create_table_blocks extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%blocks}}',[
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'site_id' => $this->integer(),
            'name' => $this->string(),
            'type_id' => $this->integer(),
            'config' => $this->text(),
            'created_at' => $this->timestamp()->defaultValue(new \yii\db\Expression('NOW()')),
            'updated_at' => $this->timestamp()->null(),
            'deleted' => $this->boolean()->defaultValue(false),
        ]);
        $this->createIndex('i-blocks', '{{%blocks}}', ['name', 'type_id'], false);
        $this->addForeignKey('fk-block-user', '{{%blocks}}', 'user_id', '{{%users}}', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('fk-block-site', '{{%blocks}}', 'site_id', '{{%sites}}', 'id', 'RESTRICT', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%blocks}}');
    }
}