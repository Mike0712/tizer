<?php

use yii\db\Migration;

/**
 * Class m180308_152028_create_table_campaign_to_operator
 */
class m180308_152028_create_table_campaign_to_operator extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%campaign_to_operator}}',[
            'id' => $this->primaryKey(),
            'campaign_id' => $this->integer(),
            'operator_id' => $this->integer(),
        ]);
        $this->addForeignKey('fk-campaign_to_operator-campaign', '{{%campaign_to_operator}}', 'campaign_id', '{{%campaigns}}', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('fk-campaign_to_operator-operator', '{{%campaign_to_operator}}', 'operator_id', '{{%cellular_operators}}', 'id', 'RESTRICT', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%campaign_to_operator}}');
    }
}
