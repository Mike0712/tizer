<?php

namespace common\models\tickets;

/**
 * This is the ActiveQuery class for [[TicketMessage]].
 *
 * @see TicketMessage
 */
class TicketMessagesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return TicketMessage[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TicketMessage|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
