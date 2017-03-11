<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Flowerdb;

/**
 * FlowerdbSearch represents the model behind the search form about `app\models\Flowerdb`.
 */
class FlowerdbSearch extends Flowerdb
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'temp'], 'integer'],
            [['name', 'description', 'light', 'water', 'location'], 'safe'],
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
        $query = Flowerdb::find();

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
            'temp' => $this->temp,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'light', $this->light])
            ->andFilterWhere(['like', 'water', $this->water])
            ->andFilterWhere(['like', 'location', $this->location]);

        return $dataProvider;
    }
}
