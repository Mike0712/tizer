<?php

namespace common\models\sites;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\sites\Site;

/**
 * SiteSearch represents the model behind the search form of `common\models\sites\Site`.
 */
class SiteSearch extends Site
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'status'], 'integer'],
            [['url', 'statistic_url', 'statistic_pass', 'confirm_status', 'ban_msg', 'created_at', 'updated_at', 'deleted'], 'safe'],
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
        $query = Site::find();

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
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'statistic_url', $this->statistic_url])
            ->andFilterWhere(['like', 'statistic_pass', $this->statistic_pass])
            ->andFilterWhere(['like', 'confirm_status', $this->confirm_status])
            ->andFilterWhere(['like', 'ban_msg', $this->ban_msg])
            ->andFilterWhere(['like', 'deleted', $this->deleted]);

        return $dataProvider;
    }
}
