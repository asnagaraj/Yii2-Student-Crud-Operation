<?php

namespace frontend\modules\settings\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\settings\models\Mark;

/**
 * MarkSearch represents the model behind the search form of `frontend\modules\settings\models\Mark`.
 */
class MarkSearch extends Mark
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'tamil', 'english', 'maths', 'science', 'social'], 'integer'],
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
        $query = Mark::find();

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
            'tamil' => $this->tamil,
            'english' => $this->english,
            'maths' => $this->maths,
            'science' => $this->science,
            'social' => $this->social,
        ]);

        return $dataProvider;
    }
}
