<?php

namespace common\models\sites;

use common\models\blocks\Block;
use common\models\User;
use Yii;

/**
 * This is the model class for table "sites".
 *
 * @property int $id
 * @property int $user_id
 * @property string $url
 * @property int $status
 * @property string $statistic_url
 * @property string $statistic_pass
 * @property int $confirm_status
 * @property string $ban_msg
 * @property string $created_at
 * @property string $updated_at
 * @property int $deleted
 *
 * @property Blocks[] $blocks
 * @property Users $user
 */
class Site extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sites';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['url', 'statistic_url', 'statistic_pass', 'ban_msg'], 'string', 'max' => 255],
            [['confirm_status', 'deleted'], 'string', 'max' => 1],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('site', 'ID'),
            'user_id' => Yii::t('site', 'User ID'),
            'url' => Yii::t('site', 'Url'),
            'status' => Yii::t('site', 'Status'),
            'statistic_url' => Yii::t('site', 'Statistic Url'),
            'statistic_pass' => Yii::t('site', 'Statistic Pass'),
            'confirm_status' => Yii::t('site', 'Confirm Status'),
            'ban_msg' => Yii::t('site', 'Ban Msg'),
            'created_at' => Yii::t('site', 'Created At'),
            'updated_at' => Yii::t('site', 'Updated At'),
            'deleted' => Yii::t('site', 'Deleted'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBlocks()
    {
        return $this->hasMany(Block::class, ['site_id' => 'id']);
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
     * @return SitesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SitesQuery(get_called_class());
    }
}
