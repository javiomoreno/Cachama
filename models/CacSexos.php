<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cac_sexos".
 *
 * @property integer $sexoiden
 * @property string $sexonomb
 * @property string $sexodesc
 * @property integer $usuamodi
 * @property integer $fechmodi
 *
 * @property CacUsuarios[] $cacUsuarios
 */
class CacSexos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cac_sexos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['usuamodi', 'fechmodi'], 'integer'],
            [['sexonomb'], 'string', 'max' => 50],
            [['sexodesc'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sexoiden' => 'Sexoiden',
            'sexonomb' => 'Sexonomb',
            'sexodesc' => 'Sexodesc',
            'usuamodi' => 'Usuamodi',
            'fechmodi' => 'Fechmodi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCacUsuarios()
    {
        return $this->hasMany(CacUsuarios::className(), ['cac_sexos_sexoiden' => 'sexoiden']);
    }
}
