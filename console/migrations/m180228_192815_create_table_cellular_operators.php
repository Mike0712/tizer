<?php

use yii\db\Migration;

/**
 * Class m180228_192815_create_table_cellular_operators
 */
class m180228_192815_create_table_cellular_operators extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%cellular_operators}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'ip_min' => $this->string(),
            'ip_max' => $this->string(),
            'country_short' => $this->string('2'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%cellular_operators}}');
    }
}
