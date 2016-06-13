<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CacAlimentos;

/**
 * CacAlimentosSearch represents the model behind the search form about `app\models\CacAlimentos`.
 */
class CacAlimentosSearch extends CacAlimentos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['alimiden', 'cac_proveedores_providen', 'usuamodi'], 'integer'],
            [['alimnomb', 'alimdesc', 'alimimag', 'alimcodi', 'fechmodi'], 'safe'],
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
        $query = CacAlimentos::find();

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
            'alimiden' => $this->alimiden,
            'cac_proveedores_providen' => $this->cac_proveedores_providen,
            'usuamodi' => $this->usuamodi,
            'fechmodi' => $this->fechmodi,
        ]);

        $query->andFilterWhere(['like', 'alimnomb', $this->alimnomb])
            ->andFilterWhere(['like', 'alimdesc', $this->alimdesc])
            ->andFilterWhere(['like', 'alimcodi', $this->alimcodi])
            ->andFilterWhere(['like', 'alimimag', $this->alimimag]);

        return $dataProvider;
    }
}
