<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CacVentas;

/**
 * CacVentasSearch represents the model behind the search form about `app\models\CacVentas`.
 */
class CacVentasSearch extends CacVentas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ventiden', 'cac_lagunas_especies_laesinde', 'cac_usuarios_usuaiden_cl', 'cac_usuarios_usuaiden_us', 'usuamodi'], 'integer'],
            [['ventfech', 'fechmodi'], 'safe'],
            [['vanttota'], 'number'],
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
        $query = CacVentas::find();

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
            'ventiden' => $this->ventiden,
            'cac_lagunas_especies_laesinde' => $this->cac_lagunas_especies_laesinde,
            'cac_usuarios_usuaiden_cl' => $this->cac_usuarios_usuaiden_cl,
            'cac_usuarios_usuaiden_us' => $this->cac_usuarios_usuaiden_us,
            'ventfech' => $this->ventfech,
            'vanttota' => $this->vanttota,
            'usuamodi' => $this->usuamodi,
            'fechmodi' => $this->fechmodi,
        ]);

        return $dataProvider;
    }
}
