<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cac_lagunas".
 *
 * @property integer $laguiden
 * @property integer $cac_usuarios_usuaiden
 * @property string $lagunomb
 * @property string $lagutama
 * @property integer $lagucapa
 * @property integer $lagudesc
 */
class CacLagunas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cac_lagunas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cac_usuarios_usuaiden'], 'required'],
            [['cac_usuarios_usuaiden', 'lagucapa'], 'integer'],
            [['lagunomb', 'lagutama'], 'string', 'max' => 50],
            [['lagunomb', 'lagudesc'], 'string', 'max' => 300],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'laguiden' => 'Laguiden',
            'cac_usuarios_usuaiden' => 'Cac Usuarios Usuaiden',
            'lagunomb' => 'Nombre de la Laguna',
            'lagutama' => 'Tamaño de la Laguna',
            'lagucapa' => 'Capacidad de la Laguna',
            'lagudesc' => 'Descripción',
        ];
    }
}
