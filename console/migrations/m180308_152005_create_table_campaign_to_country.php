<?php

use yii\db\Migration;

/**
 * Class m180308_152005_create_table_campaign_to_country
 */
class m180308_152005_create_table_campaign_to_country extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%campaign_to_country}}',[
            'id' => $this->primaryKey(),
            'campaign_id' => $this->integer(),
            'country_id' => $this->integer(),
        ]);
        $this->addForeignKey('fk-campaign_to_country-country', '{{%campaign_to_country}}', 'country_id', '{{%campaigns}}', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('fk-campaign_to_country-campaign', '{{%campaign_to_country}}', 'campaign_id', '{{%countries}}', 'id', 'RESTRICT', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%campaign_to_country}}');
    }
}
