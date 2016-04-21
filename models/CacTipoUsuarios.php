<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cac_tipoUsuarios".
 *
 * @property integer $tiusiden
 * @property string $tiusnomb
 * @property string $tiusdesc
 * @property integer $usuamodi
 * @property string $fechamodi
 *
 * @property CacUsuarios[] $cacUsuarios
 */
class CacTipoUsuarios extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cac_tipoUsuarios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['usuamodi'], 'integer'],
            [['fechamodi'], 'safe'],
            [['tiusnomb'], 'string', 'max' => 50],
            [['tiusdesc'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tiusiden' => 'Tiusiden',
            'tiusnomb' => 'Tiusnomb',
            'tiusdesc' => 'Tiusdesc',
            'usuamodi' => 'Usuamodi',
            'fechamodi' => 'Fechamodi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCacUsuarios()
    {
        return $this->hasMany(CacUsuarios::className(), ['cac_tiposUsuarios_tiusiden' => 'tiusiden']);
    }
}
