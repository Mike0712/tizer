<?php

use yii\db\Migration;

/**
 * Class m180228_191754_create_table_campaigns
 */
class m180228_191823_create_table_ads extends Migration
{
    public function up()
    {
        $this->createTable('{{%ads}}',[
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'campaign_id' => $this->integer(),
            'active' => $this->boolean(),
            'status' => $this->integer(),
            'type' => $this->integer(),
            'img' => $this->string(),
            'title' => $this->string(),
            'text' => $this->string('1000'),
            'today_money' => $this->decimal(),
            'yestarday_money' => $this->decimal(),
            'created_at' => $this->timestamp()->defaultValue(new \yii\db\Expression('NOW()')),
            'updated_at' => $this->timestamp()->null(),
            'deleted' => $this->boolean()->defaultValue(false),
        ]);

        $this->createIndex('i-ads', '{{%ads}}', ['title', 'today_money', 'yestarday_money'], false);
        $this->addForeignKey('fk-ad-user', '{{%ads}}', 'user_id', '{{%users}}', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('fk-ad-campaign', '{{%ads}}', 'campaign_id', '{{%campaigns}}', 'id', 'RESTRICT', 'CASCADE');
    }


    public function down()
    {
        $this->dropTable('{{%ads}}');
    }
}
