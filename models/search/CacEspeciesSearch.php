<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CacEspecies;

/**
 * CacEspeciesSearch represents the model behind the search form about `app\models\CacEspecies`.
 */
class CacEspeciesSearch extends CacEspecies
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['espeiden', 'cac_proveedores_providen', 'usuamodi'], 'integer'],
            [['espenomb', 'especara', 'espeimag', 'especodi', 'fechmodi'], 'safe'],
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
        $query = CacEspecies::find();

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
            'espeiden' => $this->espeiden,
            'cac_proveedores_providen' => $this->cac_proveedores_providen,
            'usuamodi' => $this->usuamodi,
            'fechmodi' => $this->fechmodi,
        ]);

        $query->andFilterWhere(['like', 'espenomb', $this->espenomb])
            ->andFilterWhere(['like', 'especara', $this->especara])
            ->andFilterWhere(['like', 'especodi', $this->especodi])
            ->andFilterWhere(['like', 'espeimag', $this->espeimag]);

        return $dataProvider;
    }
}
