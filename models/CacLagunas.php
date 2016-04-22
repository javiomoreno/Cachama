<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cac_lagunas".
 *
 * @property integer $laguiden
 * @property string $lagunomb
 * @property string $lagutama
 * @property integer $lagucapa
 * @property string $lagudesc
 * @property resource $laguimag
 * @property resource $lagucodi
 * @property integer $usuamodi
 * @property string $fechmodi
 *
 * @property CacLagunasEspecies[] $cacLagunasEspecies
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
            [['lagucapa', 'usuamodi'], 'integer'],
            [['fechmodi'], 'safe'],
            [['lagunomb', 'lagutama'], 'string', 'max' => 50],
            [['lagucodi'], 'string', 'max' => 30],
            [['lagudesc'], 'string', 'max' => 200],
            ['laguimag', 'file', 'extensions' => 'jpg, jpeg, gif, png, bmp', 'mimeTypes' => 'image/jpeg, image/gif, image/png, image/bmp', 'skipOnEmpty' => true, 'maxSize' => 1024000, 'tooBig' => 'Tamaño de Imágen Máximo 1MB'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'laguiden' => 'Identificador de Laguna',
            'lagunomb' => 'Nombre de Laguna',
            'lagutama' => 'Tamaño de Laguna',
            'lagucapa' => 'Capacidad de Laguna',
            'lagudesc' => 'Descripción',
            'laguimag' => 'Laguimag',
            'Lagucodi' => 'Lagucodi',
            'usuamodi' => 'Usuamodi',
            'fechmodi' => 'Fechmodi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCacLagunasEspecies()
    {
        return $this->hasMany(CacLagunasEspecies::className(), ['cac_lagunas_laguiden' => 'laguiden']);
    }
}
