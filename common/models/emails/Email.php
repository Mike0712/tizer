<?php

namespace common\models\emails;

use Yii;

/**
 * This is the model class for table "emails".
 *
 * @property int $id
 * @property string $email
 * @property string $date
 */
class Email extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'emails';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date'], 'safe'],
            [['email'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('email', 'ID'),
            'email' => Yii::t('email', 'Email'),
            'date' => Yii::t('email', 'Date'),
        ];
    }

    /**
     * @inheritdoc
     * @return EmailsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EmailsQuery(get_called_class());
    }
}
