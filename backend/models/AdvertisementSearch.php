<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Advertisement;

/**
 * AdvertisementSearch represents the model behind the search form about `backend\models\Advertisement`.
 */
class AdvertisementSearch extends Advertisement
{
    /**
     * @inheritdoc
     */
    
  public $user;
  public $category;
          
          
    public function rules()
    {
        return [
            [['id', 'price', 'mobile_number', 'state_id', 'city_id', 'status'], 'integer'],
            [['user', 'category','advertise_title', 'photo_name', 'description', 'contact_name', 'email', 'address','v_code'], 'safe'],
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
        $query = Advertisement::find();
         $query->joinWith(['user','category']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['id' => SORT_DESC]]
        ]);
        
         $dataProvider->sort->attributes['user'] = [
        // The tables are the ones our relation are configured to
        // in my case they are prefixed with "tbl_"
        'asc' => ['user.username' => SORT_ASC],
        'desc' => ['user.username' => SORT_DESC],
    ];

          $dataProvider->sort->attributes['category'] = [
        // The tables are the ones our relation are configured to
        // in my case they are prefixed with "tbl_"
        'asc' => ['category.title' => SORT_ASC],
        'desc' => ['category.title' => SORT_DESC],
    ];
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'category_id' => $this->category_id,
            'price' => $this->price,
            'mobile_number' => $this->mobile_number,
            'state_id' => $this->state_id,
            'city_id' => $this->city_id,
            //'v_code' => 1,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'advertise_title', $this->advertise_title])
                ->andFilterWhere(['like', 'user.username', $this->user])
                ->andFilterWhere(['like', 'category.title', $this->category])
            ->andFilterWhere(['like', 'photo_name', $this->photo_name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'contact_name', $this->contact_name])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'address', $this->address]);

        return $dataProvider;
    }
}
