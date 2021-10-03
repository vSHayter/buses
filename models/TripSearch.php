<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Trip;

/**
 * TripSearch represents the model behind the search form of `app\models\Trip`.
 */
class TripSearch extends Trip
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_from', 'id_to', 'id_bus'], 'integer'],
            [['time_start', 'time_end', 'period'], 'safe'],
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
        $query = Trip::find();

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
            'id_from' => $this->id_from,
            'id_to' => $this->id_to,
            'time_start' => $this->time_start,
            'time_end' => $this->time_end,
            'id_bus' => $this->id_bus,
        ]);

        $query->andFilterWhere(['like', 'period', $this->period]);

        return $dataProvider;
    }
}
