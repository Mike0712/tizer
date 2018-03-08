<?php

use yii\db\Migration;

/**
 * Class m180308_154922_create_table_campaign_to_ban_category
 */
class m180308_154922_create_table_campaign_to_ban_category extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%campaign_to_ban_category}}', [
            'id' => $this->primaryKey(),
            'campaign_id' => $this->integer(),
            'category_id' => $this->integer(),
        ]);
        $this->addForeignKey('fk-campaign_to_ban_category-campaign', '{{%campaign_to_ban_category}}', 'campaign_id', '{{%campaigns}}', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('fk-campaign_to_ban_category-category', '{{%campaign_to_ban_category}}', 'category_id', '{{%categories}}', 'id', 'RESTRICT', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%campaign_to_ban_category}}');
    }
}
