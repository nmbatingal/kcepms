<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\PrReport;

/**
 * PrReportSearch represents the model behind the search form about `common\models\PrReport`.
 */
class PrReportSearch extends PrReport
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pr_id', 'tracker_id', 'requested_by', 'approved_by', 'encoder', 'pr_type', 'status', 'ppmp_mode'], 'integer'],
            [['pr_no', 'purpose', 'date_created'], 'safe'],
            [['total_pr_amount'], 'number'],
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
        $query = PrReport::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'  => [
                'defaultOrder' => [
                    'pr_id' => SORT_DESC,
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
            'pr_id' => $this->pr_id,
            'tracker_id' => $this->tracker_id,
            'date_created' => $this->date_created,
            'total_pr_amount' => $this->total_pr_amount,
            'requested_by' => $this->requested_by,
            'approved_by' => $this->approved_by,
            'encoder' => $this->encoder,
            'pr_type' => $this->pr_type,
            'ppmp_mode' => $this->ppmp_mode,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'pr_no', $this->pr_no])
            ->andFilterWhere(['like', 'purpose', $this->purpose]);

        return $dataProvider;
    }
}
