<?php

namespace console\controllers;


use yii\console\controllers\BaseMigrateController;
use Yii;
use yii\db\Connection;
use yii\db\Query;
use yii\di\Instance;
use yii\helpers\ArrayHelper;
use yii\helpers\Console;

class ChmigrateController extends BaseMigrateController
{
    /**
     * Maximum length of a migration name.
     * @since 2.0.13
     */
    const MAX_NAME_LENGTH = 180;

    public $db = 'db';

    public $clickhouse;

    public $migrationTable = 'clickhouse_migration';

    public $templateFile = '@console/views/clickhouse_migration.php';

    public $migrationPath = ['@app/clickhouse_migrations'];

    private $_migrationNameLimit;

    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            $this->db = Instance::ensure($this->db, Connection::class);
            $this->clickhouse = \Yii::$app->clickhouse;
            return true;
        }

        return false;
    }

    public function actionIndex()
    {
        $clickhouse = \Yii::$app->clickhouse;
        var_dump($clickhouse);die;
    }

    /**
     * {@inheritdoc}
     */
    protected function addMigrationHistory($version)
    {
        $command = $this->db->createCommand();
        $command->insert($this->migrationTable, [
            'version' => $version,
            'apply_time' => time(),
        ])->execute();
    }

    protected function removeMigrationHistory($version)
    {
        // TODO: Implement removeMigrationHistory() method.
    }

    /**
     * {@inheritdoc}
     */
    protected function getMigrationHistory($limit)
    {
        if ($this->db->schema->getTableSchema($this->migrationTable, true) === null) {
            $this->createMigrationHistoryTable();
        }
        $query = (new Query())
            ->select(['version', 'apply_time'])
            ->from($this->migrationTable)
            ->orderBy(['apply_time' => SORT_DESC, 'version' => SORT_DESC]);

        if (empty($this->migrationNamespaces)) {
            $query->limit($limit);
            $rows = $query->all($this->db);
            $history = ArrayHelper::map($rows, 'version', 'apply_time');
            unset($history[self::BASE_MIGRATION]);
            return $history;
        }

        $rows = $query->all($this->db);

        $history = [];
        foreach ($rows as $key => $row) {
            if ($row['version'] === self::BASE_MIGRATION) {
                continue;
            }
            if (preg_match('/m?(\d{6}_?\d{6})(\D.*)?$/is', $row['version'], $matches)) {
                $time = str_replace('_', '', $matches[1]);
                $row['canonicalVersion'] = $time;
            } else {
                $row['canonicalVersion'] = $row['version'];
            }
            $row['apply_time'] = (int) $row['apply_time'];
            $history[] = $row;
        }

        usort($history, function ($a, $b) {
            if ($a['apply_time'] === $b['apply_time']) {
                if (($compareResult = strcasecmp($b['canonicalVersion'], $a['canonicalVersion'])) !== 0) {
                    return $compareResult;
                }

                return strcasecmp($b['version'], $a['version']);
            }

            return ($a['apply_time'] > $b['apply_time']) ? -1 : +1;
        });

        $history = array_slice($history, 0, $limit);

        $history = ArrayHelper::map($history, 'version', 'apply_time');

        return $history;
    }

    /**
     * Creates the migration history table.
     */
    protected function createMigrationHistoryTable()
    {
        $tableName = $this->db->schema->getRawTableName($this->migrationTable);
        $this->stdout("Creating migration history table \"$tableName\"...", Console::FG_YELLOW);
        $this->db->createCommand()->createTable($this->migrationTable, [
            'version' => 'varchar(' . static::MAX_NAME_LENGTH . ') NOT NULL PRIMARY KEY',
            'apply_time' => 'integer',
        ])->execute();
        $this->db->createCommand()->insert($this->migrationTable, [
            'version' => self::BASE_MIGRATION,
            'apply_time' => time(),
        ])->execute();
        $this->stdout("Done.\n", Console::FG_GREEN);
    }

    protected function getMigrationNameLimit()
    {
        if ($this->_migrationNameLimit !== null) {
            return $this->_migrationNameLimit;
        }
        $tableSchema = $this->db->schema ? $this->db->schema->getTableSchema($this->migrationTable, true) : null;
        if ($tableSchema !== null) {
            return $this->_migrationNameLimit = $tableSchema->columns['version']->size;
        }

        return static::MAX_NAME_LENGTH;
    }
}