<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Student;

/**
 * StudentSearch represents the model behind the search form of `common\models\Student`.
 */
class StudentSearch extends Student
{
    /**
     * {@inheritdoc}
     */
    public $schoolclass_id,$taluk_id,$district_id,$state_id,$country_id;

    public function rules()
    {
        return [
            [['id', 's_roll_number'], 'integer'],
            [['s_name', 's_address', 'schoolclass_id', 'taluk_id', 'district_id', 'state_id','country_id'], 'safe'],
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
        $query = Student::find();

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
        $query->joinWith('schoolclass');
        $query->joinWith('taluk');
        $query->joinWith('district');
        $query->joinWith('state');
        $query->joinWith('country');
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            's_roll_number' => $this->s_roll_number,
         ]);

        $query->andFilterWhere(['like', 's_name', $this->s_name]);
         $query->andFilterWhere(['like', 's_address', $this->s_address]);
            $query->andFilterWhere(['like', 'schoolclass.class_name', $this->schoolclass_id]);
            $query->andFilterWhere(['like','taluk.taluk_name', $this->taluk_id,]);
            $query->andFilterWhere(['like','district.district_name', $this->district_id,]);
            $query->andFilterWhere(['like','state.state_name',$this->state_id,]);
            $query->andFilterWhere(['like','country.country_name',$this->country_id]);
        
        
            return $dataProvider;
    }
}
