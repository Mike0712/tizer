<?php

namespace common\models\blocks;

use common\models\sites\Site;
use common\models\User;
use Yii;

/**
 * This is the model class for table "blocks".
 *
 * @property int $id
 * @property int $user_id
 * @property int $site_id
 * @property string $name
 * @property int $type_id
 * @property string $config
 * @property string $created_at
 * @property string $updated_at
 * @property int $deleted
 *
 * @property Sites $site
 * @property Users $user
 */
class Block extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'blocks';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'site_id', 'type_id'], 'integer'],
            [['config'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['deleted'], 'string', 'max' => 1],
            [['site_id'], 'exist', 'skipOnError' => true, 'targetClass' => Site::class, 'targetAttribute' => ['site_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('block', 'ID'),
            'user_id' => Yii::t('block', 'User ID'),
            'site_id' => Yii::t('block', 'Site ID'),
            'name' => Yii::t('block', 'Name'),
            'type_id' => Yii::t('block', 'Type ID'),
            'config' => Yii::t('block', 'Config'),
            'created_at' => Yii::t('block', 'Created At'),
            'updated_at' => Yii::t('block', 'Updated At'),
            'deleted' => Yii::t('block', 'Deleted'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSite()
    {
        return $this->hasOne(Site::class, ['id' => 'site_id']);
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
     * @return BlocksQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BlocksQuery(get_called_class());
    }
}
