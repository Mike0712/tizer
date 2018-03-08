<?php

namespace common\models\campaigns;

use common\models\ads\Ad;
use common\models\categories\Category;
use common\models\countries\Country;
use common\models\operators\Operator;
use common\models\User;
use Yii;

/**
 * This is the model class for table "campaigns".
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $url
 * @property string $price
 * @property int $active
 * @property int $status
 * @property int $cpm
 * @property int $cpc
 * @property int $category_id
 * @property int $type
 * @property int $repeat
 * @property int $systraf
 * @property int $ip_white
 * @property int $ip_black
 * @property int $whitelist
 * @property int $blacklist
 * @property string $days
 * @property string $hours
 * @property int $only_img
 * @property string $created_at
 * @property string $updated_at
 * @property int $deleted
 *
 * @property Ads[] $ads
 * @property CampaignToBanCategory[] $campaignToBanCategories
 * @property CampaignToCategory[] $campaignToCategories
 * @property CampaignToCountry[] $campaignToCountries
 * @property CampaignToOperator[] $campaignToOperators
 * @property Categories $category
 * @property Users $user
 * @property SiteToBanCategory[] $siteToBanCategories
 */
class Campaign extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'campaigns';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'cpm', 'cpc', 'category_id', 'type'], 'integer'],
            [['price'], 'number'],
            [['days', 'hours'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'url'], 'string', 'max' => 255],
            [['active', 'status', 'repeat', 'systraf', 'ip_white', 'ip_black', 'whitelist', 'blacklist', 'only_img', 'deleted'], 'string', 'max' => 1],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('campaign', 'ID'),
            'user_id' => Yii::t('campaign', 'User ID'),
            'name' => Yii::t('campaign', 'Name'),
            'url' => Yii::t('campaign', 'Url'),
            'price' => Yii::t('campaign', 'Price'),
            'active' => Yii::t('campaign', 'Active'),
            'status' => Yii::t('campaign', 'Status'),
            'cpm' => Yii::t('campaign', 'Cpm'),
            'cpc' => Yii::t('campaign', 'Cpc'),
            'category_id' => Yii::t('campaign', 'Category ID'),
            'type' => Yii::t('campaign', 'Type'),
            'repeat' => Yii::t('campaign', 'Repeat'),
            'systraf' => Yii::t('campaign', 'Systraf'),
            'ip_white' => Yii::t('campaign', 'Ip White'),
            'ip_black' => Yii::t('campaign', 'Ip Black'),
            'whitelist' => Yii::t('campaign', 'Whitelist'),
            'blacklist' => Yii::t('campaign', 'Blacklist'),
            'days' => Yii::t('campaign', 'Days'),
            'hours' => Yii::t('campaign', 'Hours'),
            'only_img' => Yii::t('campaign', 'Only Img'),
            'created_at' => Yii::t('campaign', 'Created At'),
            'updated_at' => Yii::t('campaign', 'Updated At'),
            'deleted' => Yii::t('campaign', 'Deleted'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAds()
    {
        return $this->hasMany(Ad::class, ['campaign_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBanCategories()
    {
        return $this->hasMany(Category::class, ['id' => 'campaign_id'])
            ->viaTable('campaign_to_ban_category', ['category_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Category::class, ['id' => 'campaign_id'])
            ->viaTable('campaign_to_category', ['category_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountries()
    {
        return $this->hasMany(Country::class, ['id' => 'campaign_id'])
            ->viaTable('campaign_to_country', ['country_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCampaignToOperators()
    {
        return $this->hasMany(Operator::class, ['id' => 'campaign_id'])
            ->viaTable('campaign_to_operator', ['operator_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    /**
     * @inheritdoc
     * @return CampaignsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CampaignsQuery(get_called_class());
    }
}
