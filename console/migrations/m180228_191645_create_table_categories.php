<?php

use yii\db\Migration;

/**
 * Class m180228_191851_create_table_categories
 */
class m180228_191645_create_table_categories extends Migration
{
    public function up()
    {
        $this->createTable('{{%categories}}',[
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'name_en' => $this->string(),
        ]);
    }

    public function down()
    {
        $this->dropTable('categories');
    }
}
