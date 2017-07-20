<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\PrTracker;

/**
 * PrTrackerSearch represents the model behind the search form about `common\models\PrTracker`.
 */
class PrTrackerSearch extends PrTracker
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pr_tracker_id', 'tracker_year', 'tracker_month', 'tracker_seq', 'encoder', 'status'], 'integer'],
            [['tracker_no', 'proposal_no', 'tracker_title', 'unit_responsible', 'proponent', 'date_created', 'date_updated'], 'safe'],
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
        $query = PrTracker::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'  => [
                'defaultOrder' => [
                    'pr_tracker_id' => SORT_DESC,
                ]
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andWhere(['status' => '1']);
        
        $query->andFilterWhere([
            'pr_tracker_id' => $this->pr_tracker_id,
            'tracker_year' => $this->tracker_year,
            'tracker_month' => $this->tracker_month,
            'tracker_seq' => $this->tracker_seq,
            'encoder' => $this->encoder,
            'date_created' => $this->date_created,
            'date_updated' => $this->date_updated,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'tracker_no', $this->tracker_no])
            ->andFilterWhere(['like', 'proposal_no', $this->proposal_no])
            ->andFilterWhere(['like', 'tracker_title', $this->tracker_title])
            ->andFilterWhere(['like', 'unit_responsible', $this->unit_responsible])
            ->andFilterWhere(['like', 'proponent', $this->proponent]);

        return $dataProvider;
    }
}
