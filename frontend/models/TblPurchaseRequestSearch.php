<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TblPurchaseRequest;

/**
 * TblPurchaseRequestSearch represents the model behind the search form about `common\models\TblPurchaseRequest`.
 */
class TblPurchaseRequestSearch extends TblPurchaseRequest
{
    /**
     * @inheritdoc
     */

    public function rules()
    {
        return [
            [['pr_no', 'doc_type_id', 'div_id', 'unit_id', 'doc_date', 'purpose', 'requested_by', 'date_encoded', 'place', 'responsible', 'prov_code', 'city_code', 'brgy_code', 'encoded_by', 'username'], 'safe'],
            [['tot_amount'], 'number'],
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
        $query = TblPurchaseRequest::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'  => [
                'defaultOrder' => [
                    'date_encoded' => SORT_DESC,
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
        $query->joinWith('prReport');

        $query->andFilterWhere([
            'doc_date' => $this->doc_date,
            'tot_amount' => $this->tot_amount,
            'date_encoded' => $this->date_encoded,
        ]);

        $query->andFilterWhere(['like', 'pr_no', $this->pr_no])
            ->andFilterWhere(['like', 'doc_type_id', $this->doc_type_id])
            ->andFilterWhere(['like', 'div_id', $this->div_id])
            ->andFilterWhere(['like', 'unit_id', $this->unit_id])
            ->andFilterWhere(['like', 'purpose', $this->purpose])
            ->andFilterWhere(['like', 'requested_by', $this->requested_by])
            ->andFilterWhere(['like', 'place', $this->place])
            ->andFilterWhere(['like', 'responsible', $this->responsible])
            ->andFilterWhere(['like', 'prov_code', $this->prov_code])
            ->andFilterWhere(['like', 'city_code', $this->city_code])
            ->andFilterWhere(['like', 'brgy_code', $this->brgy_code])
            ->andFilterWhere(['like', 'encoded_by', $this->encoded_by])
            ->andFilterWhere(['like', 'username', $this->username]);

        return $dataProvider;
    }
}
