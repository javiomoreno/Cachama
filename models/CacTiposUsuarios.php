<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cac_tiposUsuarios".
 *
 * @property integer $tiusiden
 * @property string $tiusnomb
 * @property string $tiusdesc
 *
 * @property CacUsuarios[] $cacUsuarios
 */
class CacTiposUsuarios extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cac_tiposUsuarios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
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
