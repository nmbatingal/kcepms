<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TblLogs;

/**
 * TblLogsSearch represents the model behind the search form about `common\models\TblLogs`.
 */
class TblLogsSearch extends TblLogs
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['log_id', 'encoder', 'action', 'tbl_id'], 'integer'],
            [['tbl_name', 'tbl_col', 'details', 'log_date'], 'safe'],
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
        $query = TblLogs::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'  => [
                'defaultOrder' => [
                    'log_id' => SORT_DESC,
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
            'log_id' => $this->log_id,
            'encoder' => $this->encoder,
            'action' => $this->action,
            'tbl_id' => $this->tbl_id,
            'log_date' => $this->log_date,
        ]);

        $query->andFilterWhere(['like', 'tbl_name', $this->tbl_name])
            ->andFilterWhere(['like', 'tbl_col', $this->tbl_col])
            ->andFilterWhere(['like', 'details', $this->details]);

        return $dataProvider;
    }
}
