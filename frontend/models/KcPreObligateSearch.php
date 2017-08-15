<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\KcPreObligate;

/**
 * KcPreObligateSearch represents the model behind the search form about `common\models\KcPreObligate`.
 */
class KcPreObligateSearch extends KcPreObligate
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['obligate_id', 'encoder'], 'integer'],
            [['pr_no', 'alobs_no'], 'safe'],
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
        $query = KcPreObligate::find();

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
        $query->joinWith('infimosPreObligate');

        $query->andFilterWhere([
            'obligate_id' => $this->obligate_id,
            'encoder' => $this->encoder,
        ]);

        $query->andFilterWhere(['like', 'pr_no', $this->pr_no])
            ->andFilterWhere(['like', 'alobs_no', $this->alobs_no]);

        return $dataProvider;
    }
}
