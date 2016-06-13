<?php

namespace app\models;

use Yii;
use app\models\CacEspecies;
use app\models\CacLagunas;
use yii\helpers\ArrayHelper;
use yii\db\Query;

/**
 * This is the model class for table "cac_lagunas_especies".
 *
 * @property integer $laesiden
 * @property integer $cac_especies_espeiden
 * @property integer $cac_lagunas_laguiden
 * @property integer $laestota
 * @property integer $laesdisp
 * @property integer $usuamodi
 * @property string $fechmodi
 *
 * @property CacLagunas $cacLagunasLaguiden
 * @property CacEspecies $cacEspeciesEspeiden
 * @property CacVentas[] $cacVentas
 */
class CacLagunasEspecies extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cac_lagunas_especies';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cac_especies_espeiden', 'cac_lagunas_laguiden'], 'required'],
            [['cac_especies_espeiden', 'cac_lagunas_laguiden', 'laestota', 'laesdisp', 'usuamodi'], 'integer'],
            [['fechmodi'], 'safe'],
            [['cac_lagunas_laguiden'], 'exist', 'skipOnError' => true, 'targetClass' => CacLagunas::className(), 'targetAttribute' => ['cac_lagunas_laguiden' => 'laguiden']],
            [['cac_especies_espeiden'], 'exist', 'skipOnError' => true, 'targetClass' => CacEspecies::className(), 'targetAttribute' => ['cac_especies_espeiden' => 'espeiden']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'laesiden' => 'Identificador de Laguna en Producción',
            'cac_especies_espeiden' => 'Cac Especies Espeiden',
            'cac_lagunas_laguiden' => 'Cac Lagunas Laguiden',
            'laestota' => 'Total Inicial',
            'laesdisp' => 'Total Disponible',
            'usuamodi' => 'Usuamodi',
            'fechmodi' => 'Fechmodi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCacLagunasLaguiden()
    {
        return $this->hasOne(CacLagunas::className(), ['laguiden' => 'cac_lagunas_laguiden']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCacEspeciesEspeiden()
    {
        return $this->hasOne(CacEspecies::className(), ['espeiden' => 'cac_especies_espeiden']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCacVentas()
    {
        return $this->hasMany(CacVentas::className(), ['cac_lagunas_especies_laesiden' => 'laesiden']);
    }

    public static function getListaLagunas()
    {
        $opciones = CacLagunas::find()->where('cac_estados_estaiden = 1')->asArray()->all();
        return ArrayHelper::map($opciones, 'laguiden', 'lagunomb');
    }

    public static function getListaEspecies()
    {
        $opciones = (new Query())
            ->select('a.*')
            ->from('cac_especies a, cac_compras b')
            ->where('a.espeiden = b.cac_especies_espeiden')
            ->andWhere('b.compcant != 0')
            ->all();
        return ArrayHelper::map($opciones, 'espeiden', 'espenomb');
    }
}
