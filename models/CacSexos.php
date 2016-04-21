<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cac_sexos".
 *
 * @property integer $sexoiden
 * @property string $sexonomb
 * @property string $sexodesc
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
