<?php

use common\components\ClickhouseMigration;

/**
 * Class m180307_094019_create_table_shows
 */
class m180307_094019_create_table_shows extends ClickhouseMigration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->clickhouse->write('
            CREATE TABLE showsOfCampaigns (
              Year UInt16,
              Quarter UInt8,
              Month UInt8,
              DayofMonth UInt8,
              DayOfWeek UInt8,
              Hour UInt8,
              DateOfShow DEFAULT toDate(EventTime),
              EventTime DateTime,
              CompamyId Int32,
              Ip String,
              Browser String,
              CountryId Int32,
              CountryShort String,
              OperatorId Int32,
              OperatorName String,
              Hash String,
              UrlFrom String
            ) ENGINE = MergeTree(DateOfShow, (Year, DateOfShow), 8192)
        ');
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->clickhouse->write('DROP TABLE IF EXISTS showsOfCampaigns');
    }
}
