<?php

namespace common\models\campaigns;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\campaigns\Campaign;

/**
 * CampaignSearch represents the model behind the search form of `common\models\campaigns\Campaign`.
 */
class CampaignSearch extends Campaign
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'cpm', 'cpc', 'category_id', 'type'], 'integer'],
            [['name', 'url', 'active', 'status', 'repeat', 'systraf', 'ip_white', 'ip_black', 'whitelist', 'blacklist', 'days', 'hours', 'only_img', 'created_at', 'updated_at', 'deleted'], 'safe'],
            [['price'], 'number'],
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
        $query = Campaign::find();

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
            'price' => $this->price,
            'cpm' => $this->cpm,
            'cpc' => $this->cpc,
            'category_id' => $this->category_id,
            'type' => $this->type,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'active', $this->active])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'repeat', $this->repeat])
            ->andFilterWhere(['like', 'systraf', $this->systraf])
            ->andFilterWhere(['like', 'ip_white', $this->ip_white])
            ->andFilterWhere(['like', 'ip_black', $this->ip_black])
            ->andFilterWhere(['like', 'whitelist', $this->whitelist])
            ->andFilterWhere(['like', 'blacklist', $this->blacklist])
            ->andFilterWhere(['like', 'days', $this->days])
            ->andFilterWhere(['like', 'hours', $this->hours])
            ->andFilterWhere(['like', 'only_img', $this->only_img])
            ->andFilterWhere(['like', 'deleted', $this->deleted]);

        return $dataProvider;
    }
}
