<?php

namespace common\models\operators;

use Yii;

/**
 * This is the model class for table "cellular_operators".
 *
 * @property int $id
 * @property string $name
 * @property string $ip_min
 * @property string $ip_max
 * @property string $country_short
 *
 * @property CampaignToOperator[] $campaignToOperators
 */
class Operator extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cellular_operators';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'ip_min', 'ip_max'], 'string', 'max' => 255],
            [['country_short'], 'string', 'max' => 2],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('operator', 'ID'),
            'name' => Yii::t('operator', 'Name'),
            'ip_min' => Yii::t('operator', 'Ip Min'),
            'ip_max' => Yii::t('operator', 'Ip Max'),
            'country_short' => Yii::t('operator', 'Country Short'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCampaignToOperators()
    {
        return $this->hasMany(CampaignToOperator::class, ['operator_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return OperatorsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OperatorsQuery(get_called_class());
    }
}
