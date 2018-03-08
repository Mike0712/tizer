<?php

use yii\db\Migration;

/**
 * Class m180228_192240_create_table_news
 */
class m180228_192240_create_table_news extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%news}}',[
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'title_en' => $this->string(),
            'text' => $this->text(),
            'text_en' => $this->text(),
            'publ_date' => $this->dateTime(),
            'vip' => $this->boolean(),
            'img' => $this->string(),
            'visibility_status' => $this->tinyInteger(),
            'created_at' => $this->timestamp()->defaultValue(new \yii\db\Expression('NOW()')),
            'updated_at' => $this->timestamp()->null(),
            'deleted' => $this->boolean()->defaultValue(false)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%news}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180228_192240_create_table_news cannot be reverted.\n";

        return false;
    }
    */
}
