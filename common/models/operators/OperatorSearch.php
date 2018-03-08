<?php

namespace common\models\operators;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\operators\Operator;

/**
 * OperatorSearch represents the model behind the search form of `common\models\operators\Operator`.
 */
class OperatorSearch extends Operator
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name', 'ip_min', 'ip_max', 'country_short'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Operator::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'ip_min', $this->ip_min])
            ->andFilterWhere(['like', 'ip_max', $this->ip_max])
            ->andFilterWhere(['like', 'country_short', $this->country_short]);

        return $dataProvider;
    }
}
