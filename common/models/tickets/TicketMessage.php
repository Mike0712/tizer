<?php

namespace common\models\tickets;

use Yii;

/**
 * This is the model class for table "ticket_messages".
 *
 * @property int $id
 * @property int $user_id
 * @property int $ticket_id
 * @property string $message
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Users $user
 */
class TicketMessage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ticket_messages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'ticket_id'], 'integer'],
            [['message'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
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
            'ticket_id' => Yii::t('ticket', 'Ticket ID'),
            'message' => Yii::t('ticket', 'Message'),
            'created_at' => Yii::t('ticket', 'Created At'),
            'updated_at' => Yii::t('ticket', 'Updated At'),
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
     * @return TicketMessagesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TicketMessagesQuery(get_called_class());
    }
}
