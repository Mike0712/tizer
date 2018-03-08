<?php

use yii\db\Migration;

/**
 * Class m180308_154940_create_table_site_to_ban_category
 */
class m180308_154940_create_table_site_to_ban_category extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%site_to_ban_category}}', [
            'id' => $this->primaryKey(),
            'site_id' => $this->integer(),
            'category_id' => $this->integer(),
        ]);
        $this->addForeignKey('fk-site_to_ban_category-site', '{{%site_to_ban_category}}', 'site_id', '{{%sites}}', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('fk-site_to_ban_category-category', '{{%site_to_ban_category}}', 'category_id', '{{%categories}}', 'id', 'RESTRICT', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%site_to_ban_category}}');
    }

}
