<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CacProveedores;

/**
 * CacProveedoresSearch represents the model behind the search form about `app\models\CacProveedores`.
 */
class CacProveedoresSearch extends CacProveedores
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['providen', 'cac_tipoProveedores_tipriden', 'usuamodi'], 'integer'],
            [['provnomb', 'provrif', 'provdire', 'provtele', 'provemai', 'provimag', 'provcodi', 'fechmodi'], 'safe'],
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
        $query = CacProveedores::find();

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
            'providen' => $this->providen,
            'cac_tipoProveedores_tipriden' => $this->cac_tipoProveedores_tipriden,
            'usuamodi' => $this->usuamodi,
            'fechmodi' => $this->fechmodi,
        ]);

        $query->andFilterWhere(['like', 'provnomb', $this->provnomb])
            ->andFilterWhere(['like', 'provrif', $this->provrif])
            ->andFilterWhere(['like', 'provdire', $this->provdire])
            ->andFilterWhere(['like', 'provtele', $this->provtele])
            ->andFilterWhere(['like', 'provemai', $this->provemai])
            ->andFilterWhere(['like', 'provcodi', $this->provcodi])
            ->andFilterWhere(['like', 'provimag', $this->provimag]);

        return $dataProvider;
    }
}
