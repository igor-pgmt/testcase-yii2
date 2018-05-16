<?php

namespace app\models;

use yii\mongodb\Query;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use app\models\Products;

/**
 * ProductsSearch represents the model behind the search form of `app\models\Products`.
 */
class ProductsSearch extends Products
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['_id', 'appid', 'name', 'addingtime'], 'safe'],
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
        // $query = Products::find()
       $collection = Yii::$app->mongodb->getCollection('products');
$query = $collection->aggregate([
    [
        '$group' => [
            '_id' => '$appid',
            'name' => [ '$first'=> '$name'],
            'appid' => [ '$first'=> '$appid'],
            'addingtime' => [ '$first'=> '$addingtime'],
            'maxValue' => ['$max'=> '$addingtime'],
        ],
    ],
]
);

 $dataProvider = new ArrayDataProvider([
        'allModels' => $query,
        'pagination' => [
            'pageSize' => 50,
        ],
        'sort' => [
            'attributes' => ['appid', 'name','addingtime'],
        ],
    ]);


// $query = (new Query())
//     ->from('products')
//     ->groupby([
//             '_id' => '$appid',
//             'maxValue' => ['$max'=> '$addingtime'],
//         ]);

        // add conditions that should always apply here

        // $dataProvider = new ActiveDataProvider([
        //     'query' => $query,
        // ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        // $query->andFilterWhere(['like', '_id', $this->_id])
        //     ->andFilterWhere(['like', 'appid', $this->appid])
        //     ->andFilterWhere(['like', 'name', $this->name])
        //     ->andFilterWhere(['like', 'addingtime', $this->addingtime]);

        return $dataProvider;
    }
}
