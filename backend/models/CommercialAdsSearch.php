<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\CommercialAds;

/**
 * CommercialAdsSearch represents the model behind the search form about `backend\models\CommercialAds`.
 */
class CommercialAdsSearch extends CommercialAds
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name', 'url', 'top_ad', 'left_ad', 'right_ad', 'centre_ad', 'bottom_ad'], 'safe'],
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
        $query = CommercialAds::find();

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
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'top_ad', $this->top_ad])
            ->andFilterWhere(['like', 'left_ad', $this->left_ad])
            ->andFilterWhere(['like', 'right_ad', $this->right_ad])
            ->andFilterWhere(['like', 'centre_ad', $this->centre_ad])
            ->andFilterWhere(['like', 'bottom_ad', $this->bottom_ad]);

        return $dataProvider;
    }
}
