<?php

use yii\db\Migration;

/**
 * Class m180228_191851_create_table_categories
 */
class m180228_191851_create_table_categories extends Migration
{
    public function up()
    {
        $this->createTable('{{%categories}}',[
            $this->primaryKey('id'),
            $this->string('name'),
            $this->string('name_en'),
        ]);
    }

    public function down()
    {
        $this->dropTable('categories');
    }
}
