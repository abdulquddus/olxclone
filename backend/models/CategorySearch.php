<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Category;

/**
 * CategorySearch represents the model behind the search form about `backend\models\Category`.
 */
class CategorySearch extends Category
{
    /**
     * @inheritdoc
     */
    
    public $parent;
    
    public function rules()
    {
        return [
            [['id', 'status',], 'integer'],
            [['image', 'description','title','parent'], 'safe'],
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
        $query = Category::find();
        
       //  $query->joinWith(['parent']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
//        $dataProvider->sort->attributes['parent'] = [
//        // The tables are the ones our relation are configured to
//        // in my case they are prefixed with "tbl_"
//        'asc' => ['category.title' => SORT_ASC],
//        'desc' => ['category.title' => SORT_DESC],
//    ];

       // $this->load($params);

        if (!($this->load($params) && $this->validate())) {
        return $dataProvider;
    }

        $query->andFilterWhere([
            'id' => $this->id,
            'title' => $this->title,
            'parent_id' => $this->parent_id,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'image', $this->image])
               // ->andFilterWhere(['like', 'category.title', $this->parent])
                ->andFilterWhere(['like', 'category.description', $this->description]);

        return $dataProvider;
    }
}
