<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\PreObligate;

/**
 * PreObligateSearch represents the model behind the search form about `common\models\PreObligate`.
 */
class PreObligateSearch extends PreObligate
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['obligate_id', 'fund_source_id', 'alobs_yr', 'alobs_month', 'alobs_seq'], 'integer'],
            [['name', 'purpose', 'alobs_no', 'alobs_date', 'accountable'], 'safe'],
            [['obligate_amount', 'amt_release'], 'number'],
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
        $query = PreObligate::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'  => [
                'defaultOrder' => [
                    'obligate_id' => SORT_DESC,
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
        $query->andFilterWhere([
            'obligate_id' => $this->obligate_id,
            'fund_source_id' => $this->fund_source_id,
            'obligate_amount' => $this->obligate_amount,
            'amt_release' => $this->amt_release,
            'alobs_yr' => $this->alobs_yr,
            'alobs_month' => $this->alobs_month,
            'alobs_seq' => $this->alobs_seq,
            'alobs_date' => $this->alobs_date,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'purpose', $this->purpose])
            ->andFilterWhere(['like', 'alobs_no', $this->alobs_no])
            ->andFilterWhere(['like', 'accountable', $this->accountable]);

        return $dataProvider;
    }
}
