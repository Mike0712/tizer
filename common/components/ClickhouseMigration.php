<?php

namespace common\components;

use yii\base\Component;
use yii\db\MigrationInterface;
use yii\db\SchemaBuilderTrait;
use yii\di\Instance;
use yii\db\Connection;


class ClickhouseMigration extends Component implements MigrationInterface
{
    use SchemaBuilderTrait;

    public $db = 'db';

    protected $clickhouse;

    public function init()
    {
        $this->clickhouse = \Yii::$app->clickhouse;
        $this->db = Instance::ensure($this->db, Connection::class);
        $this->db->getSchema()->refresh();
        $this->db->enableSlaves = false;
    }

    protected function getDb()
    {
        return $this->db;
    }

    public function up()
    {
        // TODO: Implement up() method.
    }

    public function down()
    {
        // TODO: Implement down() method.
    }

    public function createTable($table, $columns, $engine)
    {
        $this->clickhouse->write('
            CREATE TABLE IF NOT EXISTS' . $table . '(
        )
        ENGINE = SummingMergeTree(event_date, (site_id, site_key, event_time, event_date), 8192)
        ');
    }

    protected function beginCommand($description)
    {
        if (!$this->compact) {
            echo "    > $description ...";
        }
        return microtime(true);
    }
}