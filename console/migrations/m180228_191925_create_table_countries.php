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
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'name_en' => $this->string(),
            'short' => $this->string(),
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%countries}}');
    }
}
