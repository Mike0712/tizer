<?php

use yii\db\Migration;

/**
 * Class m180228_192945_create_table_profit
 */
class m180228_192945_create_table_profit extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%profit}}',[
            'id' => $this->primaryKey(),
            'date' => $this->dateTime(),
            'sum' => $this->decimal(),
            'created_at' => $this->timestamp()->defaultValue(new \yii\db\Expression('NOW()')),
            'updated_at' => $this->timestamp()->null(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%profit}}');
    }
}
