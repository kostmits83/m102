<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Stock;

/**
 * StockSearch represents the model behind the search form of `common\models\Stock`.
 */
class StockSearch extends Stock
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'isEnabled'], 'integer'],
            [['symbol', 'name', 'date', 'type', 'iexId', 'exchange', 'industry', 'website', 'description', 'CEO', 'issueType', 'sector', 'tags', 'logo_url', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Stock::find();

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
            'date' => $this->date,
            'isEnabled' => $this->isEnabled,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'symbol', $this->symbol])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'iexId', $this->iexId])
            ->andFilterWhere(['like', 'exchange', $this->exchange])
            ->andFilterWhere(['like', 'industry', $this->industry])
            ->andFilterWhere(['like', 'website', $this->website])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'CEO', $this->CEO])
            ->andFilterWhere(['like', 'issueType', $this->issueType])
            ->andFilterWhere(['like', 'sector', $this->sector])
            ->andFilterWhere(['like', 'tags', $this->tags])
            ->andFilterWhere(['like', 'logo_url', $this->logo_url]);

        return $dataProvider;
    }
}
