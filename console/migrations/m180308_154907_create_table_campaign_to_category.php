<?php

use yii\db\Migration;

/**
 * Class m180308_154907_create_table_campaign_to_category
 */
class m180308_154907_create_table_campaign_to_category extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%campaign_to_category}}', [
            'id' => $this->primaryKey(),
            'campaign_id' => $this->integer(),
            'category_id' => $this->integer(),
        ]);
        $this->addForeignKey('fk-campaign_to_category-campaign', '{{%campaign_to_category}}', 'campaign_id', '{{%campaigns}}', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('fk-campaign_to_category-category', '{{%campaign_to_category}}', 'category_id', '{{%categories}}', 'id', 'RESTRICT', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%campaign_to_category}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180308_154907_create_table_campaign_to_category cannot be reverted.\n";

        return false;
    }
    */
}
