<?php

namespace common\models\tickets;

use Yii;

/**
 * This is the model class for table "ticket".
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property int $status
 * @property string $date
 * @property int $new
 *
 * @property Users $user
 */
class Ticket extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ticket';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'status'], 'integer'],
            [['date'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['new'], 'string', 'max' => 1],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('ticket', 'ID'),
            'user_id' => Yii::t('ticket', 'User ID'),
            'name' => Yii::t('ticket', 'Name'),
            'status' => Yii::t('ticket', 'Status'),
            'date' => Yii::t('ticket', 'Date'),
            'new' => Yii::t('ticket', 'New'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::class, ['id' => 'user_id']);
    }

    /**
     * @inheritdoc
     * @return TicketsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TicketsQuery(get_called_class());
    }
}
