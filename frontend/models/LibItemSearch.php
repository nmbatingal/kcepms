<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\LibItem;

/**
 * LibItemSearch represents the model behind the search form about `common\models\LibItem`.
 */
class LibItemSearch extends LibItem
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_id', 'item_category_id', 'generic_id', 'subgeneric_id', 'unit_id', 'uacs_id', 'encoder', 'status'], 'integer'],
            [['item_description', 'barcode', 'date_added'], 'safe'],
            [['price'], 'number'],
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
        $query = LibItem::find();

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
            'item_id' => $this->item_id,
            'item_category_id' => $this->item_category_id,
            'generic_id' => $this->generic_id,
            'subgeneric_id' => $this->subgeneric_id,
            'unit_id' => $this->unit_id,
            'uacs_id' => $this->uacs_id,
            'price' => $this->price,
            'date_added' => $this->date_added,
            'encoder' => $this->encoder,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'item_description', $this->item_description])
            ->andFilterWhere(['like', 'barcode', $this->barcode]);

        return $dataProvider;
    }
}
