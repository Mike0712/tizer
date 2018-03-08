<?php

namespace common\models\profit;

use Yii;

/**
 * This is the model class for table "profit".
 *
 * @property int $id
 * @property string $date
 * @property string $sum
 * @property string $created_at
 * @property string $updated_at
 */
class Profit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'profit';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date', 'created_at', 'updated_at'], 'safe'],
            [['sum'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'date' => Yii::t('app', 'Date'),
            'sum' => Yii::t('app', 'Sum'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @inheritdoc
     * @return ProfitQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProfitQuery(get_called_class());
    }
}
