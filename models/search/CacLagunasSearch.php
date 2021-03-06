<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CacLagunas;

/**
 * CacLagunasSearch represents the model behind the search form about `app\models\CacLagunas`.
 */
class CacLagunasSearch extends CacLagunas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['laguiden', 'lagucapa', 'usuamodi'], 'integer'],
            [['lagunomb', 'lagutama', 'lagudesc', 'laguimag', 'fechmodi'], 'safe'],
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
        $query = CacLagunas::find();

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
            'laguiden' => $this->laguiden,
            'lagucapa' => $this->lagucapa,
            'usuamodi' => $this->usuamodi,
            'fechmodi' => $this->fechmodi,
        ]);

        $query->andFilterWhere(['like', 'lagunomb', $this->lagunomb])
            ->andFilterWhere(['like', 'lagutama', $this->lagutama])
            ->andFilterWhere(['like', 'lagudesc', $this->lagudesc])
            ->andFilterWhere(['like', 'laguimag', $this->laguimag]);

        return $dataProvider;
    }
}
