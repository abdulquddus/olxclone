<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Messages;

/**
 * MessagesSearch represents the model behind the search form about `backend\models\Messages`.
 */
class MessagesSearch extends Messages
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'ad_id', 'from', 'to', 'from_viewed', 'to_viewed', 'from_deleted', 'to_deleted'], 'integer'],
            [['message', 'from_vdate', 'to_vdate', 'from_ddate', 'to_ddate', 'created'], 'safe'],
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
        $query = Messages::find();

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
            'ad_id' => $this->ad_id,
            'from' => $this->from,
            'to' => $this->to,
            'from_viewed' => $this->from_viewed,
            'to_viewed' => $this->to_viewed,
            'from_deleted' => $this->from_deleted,
            'to_deleted' => $this->to_deleted,
            'from_vdate' => $this->from_vdate,
            'to_vdate' => $this->to_vdate,
            'from_ddate' => $this->from_ddate,
            'to_ddate' => $this->to_ddate,
            'created' => $this->created,
        ]);

        $query->andFilterWhere(['like', 'message', $this->message]);

        return $dataProvider;
    }
}
