<?php

use yii\db\Migration;

/**
 * Class m180228_191925_create_table_countries
 */
class m180228_191925_create_table_countries extends Migration
{
    public function up()
    {
        $this->createTable('{{%countries}}',[
            $this->primaryKey('id'),
            $this->string('name'),
            $this->string('name_en'),
            $this->string('short'),
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%countries}}');
    }
}
