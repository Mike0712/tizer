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
            $this->primaryKey('id'),

        ]);
    }

    public function down()
    {
        $this->dropTable('{{%emails}}');
    }
}
