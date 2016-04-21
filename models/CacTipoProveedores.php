<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cac_tipoProveedores".
 *
 * @property integer $tipriden
 * @property string $tiprnomb
 * @property string $tiprdesc
 * @property integer $usuamodi
 * @property string $fechmodi
 *
 * @property CacProveedores[] $cacProveedores
 */
class CacTipoProveedores extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cac_tipoProveedores';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['usuamodi'], 'integer'],
            [['fechmodi'], 'safe'],
            [['tiprnomb'], 'string', 'max' => 50],
            [['tiprdesc'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tipriden' => 'Tipriden',
            'tiprnomb' => 'Tiprnomb',
            'tiprdesc' => 'Tiprdesc',
            'usuamodi' => 'Usuamodi',
            'fechmodi' => 'Fechmodi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCacProveedores()
    {
        return $this->hasMany(CacProveedores::className(), ['cac_tipoProveedores_tipriden' => 'tipriden']);
    }
}
