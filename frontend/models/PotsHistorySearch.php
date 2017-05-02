<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PotsHistory;

/**
 * PotsHistorySearch represents the model behind the search form about `app\models\PotsHistory`.
 */
class PotsHistorySearch extends PotsHistory
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'flower_light', 'flower_waterlevel', 'flower_temp', 'flower_pressure', 'flower_moisture', 'flower_humidity'], 'integer'],
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
        $query = PotsHistory::find();

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
            'flower_light' => $this->flower_light,
            'flower_waterlevel' => $this->flower_waterlevel,
            'flower_temp' => $this->flower_temp,
            'flower_pressure' => $this->flower_pressure,
            'flower_moisture' => $this->flower_moisture,
            'flower_humidity' => $this->flower_humidity,
        ]);

        return $dataProvider;
    }
}
