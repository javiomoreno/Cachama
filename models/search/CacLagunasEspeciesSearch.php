<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CacLagunasEspecies;

/**
 * CacLagunasEspeciesSearch represents the model behind the search form about `app\models\CacLagunasEspecies`.
 */
class CacLagunasEspeciesSearch extends CacLagunasEspecies
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['laesiden', 'cac_especies_espeiden', 'cac_lagunas_laguiden', 'laestota', 'laesdisp', 'usuamodi'], 'integer'],
            [['fechmodi'], 'safe'],
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
        $query = CacLagunasEspecies::find();

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
            'laesiden' => $this->laesiden,
            'cac_especies_espeiden' => $this->cac_especies_espeiden,
            'cac_lagunas_laguiden' => $this->cac_lagunas_laguiden,
            'laestota' => $this->laestota,
            'laesdisp' => $this->laesdisp,
            'usuamodi' => $this->usuamodi,
            'fechmodi' => $this->fechmodi,
        ]);

        return $dataProvider;
    }
}
