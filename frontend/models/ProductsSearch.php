<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Products;


/**
 * ProductsSearch represents the model behind the search form of `frontend\models\Products`.
 */
class ProductsSearch extends Products
{
    /**
     * {@inheritdoc}
     */
    
    public function rules()
    {
        return [
            [['id','product_price'], 'integer'],
            [['product_name','category_id',], 'safe'],
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
        $query = Products::find();
       

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
        $query->joinWith('category');

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
        ]);
        
        $query->andFilterWhere(['like', 'product_name', $this->product_name]);
        $query->andFilterWhere(['like', 'product_price', $this->product_price]);
        $query->andFilterWhere(['like', 'category.Name', $this->category_id]);

        return $dataProvider;
    }
}
