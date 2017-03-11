<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pots;

/**
 * PotsSearch represents the model behind the search form about `app\models\Pots`.
 */
class PotsSearch extends Pots
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'flower_light', 'flower_waterlevel', 'flower_temp', 'flower_pressure', 'flower_moisture', 'flower_humidity'], 'integer'],
            [['flower_name', 'flower_desc', 'flower_created_date', 'flower_last_used_date', 'pot_name'], 'safe'],
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
        $query = Pots::find();

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
            'flower_created_date' => $this->flower_created_date,
            'flower_last_used_date' => $this->flower_last_used_date,
        ]);

        $query->andFilterWhere(['like', 'flower_name', $this->flower_name])
            ->andFilterWhere(['like', 'flower_desc', $this->flower_desc])
            ->andFilterWhere(['like', 'pot_name', $this->pot_name]);

        return $dataProvider;
    }
}
