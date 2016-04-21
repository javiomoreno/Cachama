<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CacUsuarios;

/**
 * CacUsuariosSearch represents the model behind the search form about `app\models\CacUsuarios`.
 */
class CacUsuariosSearch extends CacUsuarios
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['usuaiden', 'cac_sexos_sexoiden', 'cac_tiposUsuarios_tiusiden'], 'integer'],
            [['usuanomb', 'usuaapel', 'usuacedu', 'usuatele', 'usuadire', 'usuaemai', 'usuauser', 'usuapass'], 'safe'],
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
        $query = CacUsuarios::find();

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
            'usuaiden' => $this->usuaiden,
            'cac_sexos_sexoiden' => $this->cac_sexos_sexoiden,
            'cac_tiposUsuarios_tiusiden' => $this->cac_tiposUsuarios_tiusiden,
        ]);

        $query->andFilterWhere(['like', 'usuanomb', $this->usuanomb])
            ->andFilterWhere(['like', 'usuaapel', $this->usuaapel])
            ->andFilterWhere(['like', 'usuacedu', $this->usuacedu])
            ->andFilterWhere(['like', 'usuatele', $this->usuatele])
            ->andFilterWhere(['like', 'usuadire', $this->usuadire])
            ->andFilterWhere(['like', 'usuauser', $this->usuauser])
            ->andFilterWhere(['like', 'usuaemai', $this->usuaemai])
            ->andFilterWhere(['like', 'usuapass', $this->usuapass]);

        return $dataProvider;
    }
}
