<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Rates;

/**
 * RatesSearch represents the model behind the search form of `app\models\Rates`.
 */
class RatesSearch extends Rates
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['_id', 'pair', 'addingtime', 'ask', 'bid', 'last', 'high', 'low', 'open', 'averages', 'volume', 'changes', 'volumepercent', 'timestamp', 'displaytimestamp'], 'safe'],
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
        $query = Rates::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['pair'=>SORT_ASC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere(['like', '_id', $this->_id])
            ->andFilterWhere(['like', 'pair', $this->pair])
            ->andFilterWhere(['like', 'addingtime', $this->addingtime])
            ->andFilterWhere(['like', 'ask', $this->ask])
            ->andFilterWhere(['like', 'bid', $this->bid])
            ->andFilterWhere(['like', 'last', $this->last])
            ->andFilterWhere(['like', 'high', $this->high])
            ->andFilterWhere(['like', 'low', $this->low])
            ->andFilterWhere(['like', 'open', $this->open])
            ->andFilterWhere(['like', 'averages', $this->averages])
            ->andFilterWhere(['like', 'volume', $this->volume])
            ->andFilterWhere(['like', 'changes', $this->changes])
            ->andFilterWhere(['like', 'volumepercent', $this->volumepercent])
            ->andFilterWhere(['like', 'timestamp', $this->timestamp])
            ->andFilterWhere(['like', 'displaytimestamp', $this->displaytimestamp]);

        return $dataProvider;
    }
}
