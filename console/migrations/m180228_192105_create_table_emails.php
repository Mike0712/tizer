<?php

use yii\db\Migration;

/**
 * Class m180228_192105_create_table_emails
 */
class m180228_192105_create_table_emails extends Migration
{
    public function up()
    {
        $this->createTable('{{%emails}}',[
            'id' => $this->primaryKey(),
            'email' => $this->string(),
            'date' => $this->dateTime(),
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%emails}}');
    }
}
