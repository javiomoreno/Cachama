<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CacRegistroDiario;

/**
 * CacRegistroDiarioSearch represents the model behind the search form about `app\models\CacRegistroDiario`.
 */
class CacRegistroDiarioSearch extends CacRegistroDiario
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rediiden', 'cac_lagunas_laguiden', 'cac_alimentos_alimiden', 'redicamu', 'redicaal'], 'integer'],
            [['redifech'], 'safe'],
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
        $query = CacRegistroDiario::find();

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
            'rediiden' => $this->rediiden,
            'cac_lagunas_laguiden' => $this->cac_lagunas_laguiden,
            'cac_alimentos_alimiden' => $this->cac_alimentos_alimiden,
            'redifech' => $this->redifech,
            'redicamu' => $this->redicamu,
            'redicaal' => $this->redicaal,
        ]);

        return $dataProvider;
    }
}
