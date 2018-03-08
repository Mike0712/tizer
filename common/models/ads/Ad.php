<?php

namespace common\models\ads;

use common\models\campaign\Campaign;
use common\models\User;
use Yii;

/**
 * This is the model class for table "ads".
 *
 * @property int $id
 * @property int $user_id
 * @property int $campaign_id
 * @property int $active
 * @property int $status
 * @property int $type
 * @property string $img
 * @property string $title
 * @property string $text
 * @property string $today_money
 * @property string $yestarday_money
 * @property string $created_at
 * @property string $updated_at
 * @property int $deleted
 *
 * @property Campaigns $campaign
 * @property Users $user
 */
class Ad extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ads';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'campaign_id', 'status', 'type'], 'integer'],
            [['today_money', 'yestarday_money'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['active', 'deleted'], 'string', 'max' => 1],
            [['img', 'title'], 'string', 'max' => 255],
            [['text'], 'string', 'max' => 1000],
            [['campaign_id'], 'exist', 'skipOnError' => true, 'targetClass' => Campaign::class, 'targetAttribute' => ['campaign_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('ad', 'ID'),
            'user_id' => Yii::t('ad', 'User ID'),
            'campaign_id' => Yii::t('ad', 'Campaign ID'),
            'active' => Yii::t('ad', 'Active'),
            'status' => Yii::t('ad', 'Status'),
            'type' => Yii::t('ad', 'Type'),
            'img' => Yii::t('ad', 'Img'),
            'title' => Yii::t('ad', 'Title'),
            'text' => Yii::t('ad', 'Text'),
            'today_money' => Yii::t('ad', 'Today Money'),
            'yestarday_money' => Yii::t('ad', 'Yestarday Money'),
            'created_at' => Yii::t('ad', 'Created At'),
            'updated_at' => Yii::t('ad', 'Updated At'),
            'deleted' => Yii::t('ad', 'Deleted'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCampaign()
    {
        return $this->hasOne(Campaign::class, ['id' => 'campaign_id']);
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
     * @return AdsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AdsQuery(get_called_class());
    }
}
