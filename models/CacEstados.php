<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cac_estados".
 *
 * @property integer $estaiden
 * @property string $estanomb
 * @property string $estadesc
 * @property integer $usuamodi
 * @property string $fechamodi
 *
 * @property CacEquipos[] $cacEquipos
 * @property CacLagunas[] $cacLagunas
 */
class CacEstados extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cac_estados';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['usuamodi'], 'integer'],
            [['fechamodi'], 'safe'],
            [['estanomb'], 'string', 'max' => 50],
            [['estadesc'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'estaiden' => 'Estaiden',
            'estanomb' => 'Estanomb',
            'estadesc' => 'Estadesc',
            'usuamodi' => 'Usuamodi',
            'fechamodi' => 'Fechamodi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCacEquipos()
    {
        return $this->hasMany(CacEquipos::className(), ['cac_estados_estaiden' => 'estaiden']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCacLagunas()
    {
        return $this->hasMany(CacLagunas::className(), ['cac_estados_estaiden' => 'estaiden']);
    }
}
