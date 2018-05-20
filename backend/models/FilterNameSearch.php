<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\FilterName;

/**
 * FilterNameSearch represents the model behind the search form about `backend\models\FilterName`.
 */
class FilterNameSearch extends FilterName
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'parent_filter', 'status'], 'integer'],
            [['filter_name', 'filter_description', 'filter_value'], 'safe'],
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
        $query = FilterName::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'parent_filter' => $this->parent_filter,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'filter_name', $this->filter_name])
            ->andFilterWhere(['like', 'filter_description', $this->filter_description])
            ->andFilterWhere(['like', 'filter_value', $this->filter_value]);

        return $dataProvider;
    }
}
