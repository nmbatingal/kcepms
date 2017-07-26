<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\LibItems;

/**
 * PpmpItemOriginalSearch represents the model behind the search form about `common\models\PpmpItemOriginal`.
 */
class LibItemsSearch extends LibItems
{
    /**
     * @inheritdoc
     */
    public $full_description;

    public function rules()
    {
        return [
            [['item_id', 'generic_id', 'sub_generic_id', 'uacs_id', 'item_cat_id', 'item_status'], 'integer'],
            [['date_added', 'description', 'barcode', 'full_description'], 'safe'],
            [['est_price'], 'number'],
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
        $query = LibItems::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
                'route' => 'ppmp/load-lib-search',
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->joinWith('libGeneric');
        $query->joinWith('libSubGeneric');

        $query->andFilterWhere([
            'item_id' => $this->item_id,
            'generic_id' => $this->generic_id,
            'sub_generic_id' => $this->sub_generic_id,
            'uacs_id' => $this->uacs_id,
            'item_cat_id' => $this->item_cat_id,
            'item_status' => $this->item_status,
        ]);

        $query->andFilterWhere(['like', 'date_added', $this->date_added])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'barcode', $this->barcode])
            ->andFilterWhere(['like', 'est_price', $this->est_price]);

        return $dataProvider;
    }
}
