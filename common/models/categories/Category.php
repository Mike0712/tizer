<?php

namespace common\models\categories;

use common\models\campaigns\Campaign;
use common\models\sites\Site;
use Yii;

/**
 * This is the model class for table "categories".
 *
 * @property int $id
 * @property string $name
 * @property string $name_en
 *
 * @property CampaignToBanCategory[] $campaignToBanCategories
 * @property CampaignToCategory[] $campaignToCategories
 * @property Campaigns[] $campaigns
 * @property SiteToBanCategory[] $siteToBanCategories
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'name_en'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('category', 'ID'),
            'name' => Yii::t('category', 'Name'),
            'name_en' => Yii::t('category', 'Name En'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCampaignsToBan()
    {
        return $this->hasMany(Campaign::class, ['id' => 'category_id'])
            ->viaTable('campaign_to_ban_category', ['campaign' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCampaigns()
    {
        return $this->hasMany(Campaign::class, ['id' => 'category_id'])
            ->viaTable('campaign_to_category', ['campaign' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSitesToBan()
    {
        return $this->hasMany(Site::class, ['id' => 'category_id'])
            ->viaTable('site_to_ban_category', ['site' => 'id']);
    }

    /**
     * @inheritdoc
     * @return CategoriesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CategoriesQuery(get_called_class());
    }
}
