<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Ppmp;

/**
 * PpmpSearch represents the model behind the search form about `common\models\Ppmp`.
 */
class PpmpSearch extends Ppmp
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ppmp_id', 'ppmp_unit_id', 'ppmp_category_id', 'ppmp_mode_id', 'encoder', 'status'], 'integer'],
            [['size_quantity', 'budget', 'deduction'], 'number'],
            [['year', 'date_created'], 'safe'],
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
        $query = Ppmp::find();

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
            'ppmp_id' => $this->ppmp_id,
            'ppmp_unit_id' => $this->ppmp_unit_id,
            'ppmp_category_id' => $this->ppmp_category_id,
            'size_quantity' => $this->size_quantity,
            'budget' => $this->budget,
            'deduction' => $this->deduction,
            'ppmp_mode_id' => $this->ppmp_mode_id,
            'date_created' => $this->date_created,
            'encoder' => $this->encoder,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'year', $this->year]);

        return $dataProvider;
    }
}
