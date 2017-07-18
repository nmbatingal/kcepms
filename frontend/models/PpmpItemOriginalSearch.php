<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\PpmpItemOriginal;

/**
 * PpmpItemOriginalSearch represents the model behind the search form about `common\models\PpmpItemOriginal`.
 */
class PpmpItemOriginalSearch extends PpmpItemOriginal
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ppmp_item_original_id', 'ppmp_id', 'ppmp_item_cat_id', 'ppmp_item_subcat_id', 'inventory_id', 'unit_id', 'january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december', 'total_count'], 'integer'],
            [['item_description', 'addtitional_number'], 'safe'],
            [['item_price', 'total_amount'], 'number'],
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
        $query = PpmpItemOriginal::find();

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
            'ppmp_item_original_id' => $this->ppmp_item_original_id,
            'ppmp_id' => $this->ppmp_id,
            'ppmp_item_cat_id' => $this->ppmp_item_cat_id,
            'ppmp_item_subcat_id' => $this->ppmp_item_subcat_id,
            'inventory_id' => $this->inventory_id,
            'unit_id' => $this->unit_id,
            'item_price' => $this->item_price,
            'january' => $this->january,
            'february' => $this->february,
            'march' => $this->march,
            'april' => $this->april,
            'may' => $this->may,
            'june' => $this->june,
            'july' => $this->july,
            'august' => $this->august,
            'september' => $this->september,
            'october' => $this->october,
            'november' => $this->november,
            'december' => $this->december,
            'total_count' => $this->total_count,
            'total_amount' => $this->total_amount,
        ]);

        $query->andFilterWhere(['like', 'item_description', $this->item_description])
            ->andFilterWhere(['like', 'addtitional_number', $this->addtitional_number]);

        return $dataProvider;
    }
}
