<?php

namespace common\models\ads;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ads\Ad;

/**
 * AdSearch represents the model behind the search form of `common\models\ads\Ad`.
 */
class AdSearch extends Ad
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'campaign_id', 'status', 'type'], 'integer'],
            [['active', 'img', 'title', 'text', 'created_at', 'updated_at', 'deleted'], 'safe'],
            [['today_money', 'yestarday_money'], 'number'],
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
        $query = Ad::find();

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
            'user_id' => $this->user_id,
            'campaign_id' => $this->campaign_id,
            'status' => $this->status,
            'type' => $this->type,
            'today_money' => $this->today_money,
            'yestarday_money' => $this->yestarday_money,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'active', $this->active])
            ->andFilterWhere(['like', 'img', $this->img])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'text', $this->text])
            ->andFilterWhere(['like', 'deleted', $this->deleted]);

        return $dataProvider;
    }
}
