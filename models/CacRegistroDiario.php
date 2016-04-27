<?php

namespace app\models;

use Yii;
use app\models\CacAlimentos;
use app\models\CacLagunas;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "cac_registroDiario".
 *
 * @property integer $rediiden
 * @property integer $cac_lagunas_laguiden
 * @property integer $cac_alimentos_alimiden
 * @property string $redifech
 * @property integer $redicamu
 * @property integer $redicaal
 *
 * @property CacAlimentos $cacAlimentosAlimiden
 * @property CacLagunas $cacLagunasLaguiden
 */
class CacRegistroDiario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cac_registroDiario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cac_lagunas_laguiden', 'cac_alimentos_alimiden'], 'required'],
            [['cac_lagunas_laguiden', 'cac_alimentos_alimiden', 'redicamu', 'redicaal'], 'integer'],
            [['redifech'], 'safe'],
            [['cac_alimentos_alimiden'], 'exist', 'skipOnError' => true, 'targetClass' => CacAlimentos::className(), 'targetAttribute' => ['cac_alimentos_alimiden' => 'alimiden']],
            [['cac_lagunas_laguiden'], 'exist', 'skipOnError' => true, 'targetClass' => CacLagunas::className(), 'targetAttribute' => ['cac_lagunas_laguiden' => 'laguiden']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'rediiden' => 'Identificador del Registro',
            'cac_lagunas_laguiden' => 'Cac Lagunas Laguiden',
            'cac_alimentos_alimiden' => 'Cac Alimentos Alimiden',
            'redifech' => 'Fecha del Registro',
            'redicamu' => 'Cantidad de Muertes',
            'redicaal' => 'Cantidad de Alimento',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCacAlimentosAlimiden()
    {
        return $this->hasOne(CacAlimentos::className(), ['alimiden' => 'cac_alimentos_alimiden']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCacLagunasLaguiden()
    {
        return $this->hasOne(CacLagunas::className(), ['laguiden' => 'cac_lagunas_laguiden']);
    }

    public static function getListaLagunas()
    {
        $opciones = CacLagunas::find()->where('cac_estados_estaiden = 3')->asArray()->all();
        return ArrayHelper::map($opciones, 'laguiden', 'lagunomb');
    }

    public static function getListaAlimentos()
    {
        $opciones = CacAlimentos::find()->asArray()->all();
        return ArrayHelper::map($opciones, 'alimiden', 'alimnomb');
    }
}
