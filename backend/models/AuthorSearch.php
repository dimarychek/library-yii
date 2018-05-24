<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Author;

/**
 * AuthorSearch represents the model behind the search form of `backend\models\Author`.
 */
class AuthorSearch extends Author
{
    public $book;
    public $bookCount;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'bookCount'], 'integer'],
            [['name', 'book'], 'safe'],
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
        $query = Author::find();

        // add conditions that should always apply here
        $subQuery = Book::find()->select('author_id, COUNT(author_id) as book_count')->groupBy('author_id');
        $query->leftJoin(['bookNum' => $subQuery], 'bookNum.author_id = id');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['bookCount'] = [
            'asc' => ['book_count' => SORT_ASC],
            'desc' => ['book_count' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'book_count' => $this->bookCount,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
