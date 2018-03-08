<?php

namespace common\models\faq;

use Yii;

/**
 * This is the model class for table "faq".
 *
 * @property int $id
 * @property string $title
 * @property string $title_en
 * @property string $text
 * @property string $text_en
 */
class Faq extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'faq';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text', 'text_en'], 'string'],
            [['title', 'title_en'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('faq', 'ID'),
            'title' => Yii::t('faq', 'Title'),
            'title_en' => Yii::t('faq', 'Title En'),
            'text' => Yii::t('faq', 'Text'),
            'text_en' => Yii::t('faq', 'Text En'),
        ];
    }

    /**
     * @inheritdoc
     * @return FaqQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FaqQuery(get_called_class());
    }
}
