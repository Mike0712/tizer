<?php

namespace common\models\news;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string $title
 * @property string $title_en
 * @property string $text
 * @property string $text_en
 * @property string $publ_date
 * @property int $vip
 * @property string $img
 * @property int $visibility_status
 * @property string $created_at
 * @property string $updated_at
 * @property int $deleted
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text', 'text_en'], 'string'],
            [['publ_date', 'created_at', 'updated_at'], 'safe'],
            [['title', 'title_en', 'img'], 'string', 'max' => 255],
            [['vip', 'deleted'], 'string', 'max' => 1],
            [['visibility_status'], 'string', 'max' => 3],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('article', 'ID'),
            'title' => Yii::t('article', 'Title'),
            'title_en' => Yii::t('article', 'Title En'),
            'text' => Yii::t('article', 'Text'),
            'text_en' => Yii::t('article', 'Text En'),
            'publ_date' => Yii::t('article', 'Publ Date'),
            'vip' => Yii::t('article', 'Vip'),
            'img' => Yii::t('article', 'Img'),
            'visibility_status' => Yii::t('article', 'Visibility Status'),
            'created_at' => Yii::t('article', 'Created At'),
            'updated_at' => Yii::t('article', 'Updated At'),
            'deleted' => Yii::t('article', 'Deleted'),
        ];
    }

    /**
     * @inheritdoc
     * @return NewsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NewsQuery(get_called_class());
    }
}
