<?php

use yii\db\Migration;

/**
 * Class m180228_191624_create_table_audit
 */
class m180228_191624_create_table_audit extends Migration
{
    public function up()
    {
        $this->createTable('{{%audit}}',[
            $this->primaryKey('id'),
            $this->boolean('key'),
            $this->integer('val'),
            $this->integer('today'),
            $this->integer('today_fill'),
            $this->integer('yesterday'),
            $this->integer('yesterday_fill'),
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%audit}}');
    }
}
