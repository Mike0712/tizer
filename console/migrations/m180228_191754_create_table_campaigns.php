<?php

use yii\db\Migration;

/**
 * Class m180228_191754_create_table_campaigns
 */
class m180228_191754_create_table_campaigns extends Migration
{
    public function up()
    {
        $this->createTable('{{%campaigns}}',[
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'name' => $this->string(),
            'url' => $this->string(),
            'price' => $this->decimal(),
            'active' => $this->boolean(),
            'status' => $this->boolean(),
            'cpm' => $this->integer()->defaultValue(0),
            'cpc' => $this->integer()->defaultValue(0),
            'category_id' => $this->integer(),
            'type' => $this->integer(),
            'repeat' => $this->boolean(),
            'systraf' => $this->boolean(),
            'ip_white' => $this->boolean(),
            'ip_black' => $this->boolean(),
            'whitelist' => $this->boolean(),
            'blacklist' => $this->boolean(),
            'days' => $this->text(),
            'hours' => $this->text(),
            'only_img' => $this->boolean(),
            'created_at' => $this->timestamp()->defaultValue(new \yii\db\Expression('NOW()')),
            'updated_at' => $this->timestamp()->null(),
            'deleted' => $this->boolean()->defaultValue(false),
        ]);
        $this->createIndex('i-campaigns', '{{%campaigns}}', ['name', 'url'], false);
        $this->addForeignKey('fk-campaign-user', '{{%campaigns}}', 'user_id', '{{%users}}', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('fk-campaign-category', '{{%campaigns}}', 'category_id', '{{%categories}}', 'id', 'RESTRICT', 'CASCADE');
    }

    public function down()
    {
        $this->dropTable('{{%campaigns}}');
    }
}
