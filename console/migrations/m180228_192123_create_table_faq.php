<?php

use yii\db\Migration;

/**
 * Class m180228_192123_create_table_faq
 */
class m180228_192123_create_table_faq extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%faq}}',[
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'title_en' => $this->string(),
            'text' => $this->text(),
            'text_en' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%faq}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180228_192123_create_table_faq cannot be reverted.\n";

        return false;
    }
    */
}
