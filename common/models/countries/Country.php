<?php

namespace common\models\countries;

use common\models\campaigns\Campaign;
use Yii;

/**
 * This is the model class for table "countries".
 *
 * @property int $id
 * @property string $name
 * @property string $name_en
 * @property string $short
 *
 * @property CampaignToCountry[] $campaignToCountries
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'countries';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'name_en', 'short'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('country', 'ID'),
            'name' => Yii::t('country', 'Name'),
            'name_en' => Yii::t('country', 'Name En'),
            'short' => Yii::t('country', 'Short'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCampaigns()
    {
        return $this->hasMany(Campaign::class, ['id' => 'country_id'])
            ->viaTable('campaign_to_country', ['campaign_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return CountriesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CountriesQuery(get_called_class());
    }
}
