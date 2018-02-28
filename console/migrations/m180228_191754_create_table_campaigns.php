<?php

use yii\db\Migration;

/**
 * Class m180228_191754_create_table_campaigns
 */
class m180228_191754_create_table_campaigns extends Migration
{
    public function up()
    {
        $this->createTable('{{%campaigns}}',[
            $this->primaryKey('id'),
            $this->integer('user_id'),
            $this->string('name'),
            $this->string('url'),
            $this->decimal('price'),
            $this->boolean('active'),
            $this->boolean('status'),
            $this->integer('cpm')->defaultValue(0),
            $this->smallInteger('cat'),
            $this->integer('ban_categories'),
            $this->smallInteger('type'),
            $this->boolean('repeat'),
            $this->boolean('systraf'),
            $this->integer('country_id'),
            $this->integer('operator_id'),
            $this->string('os'),
            $this->string('browser'),
            $this->text('ip_white'),
            $this->text('ip_black'),
            $this->text('whitelist'),
            $this->text('blacklist'),
            $this->date('days'),
            $this->time('hours'),
            $this->boolean('only_img'),
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%campaigns}}');
    }
}
