<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Tournaments;

/**
 * TournamentsSearch represents the model behind the search form about `backend\models\Tournaments`.
 */
class TournamentsSearch extends Tournaments
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tournament_id'], 'integer'],
            [['tournament_name', 'tournament_description', 'tournament_status', 'tournament_start_date', 'tournament_end_date', 'tournament_json'], 'safe'],
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
        $query = Tournaments::find();

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
            'tournament_id' => $this->tournament_id,
            'tournament_start_date' => $this->tournament_start_date,
            'tournament_end_date' => $this->tournament_end_date,
        ]);

        $query->andFilterWhere(['like', 'tournament_name', $this->tournament_name])
            ->andFilterWhere(['like', 'tournament_description', $this->tournament_description])
            ->andFilterWhere(['like', 'tournament_status', $this->tournament_status])
            ->andFilterWhere(['like', 'tournament_json', $this->tournament_json]);

        return $dataProvider;
    }
}
