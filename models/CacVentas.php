<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use app\models\CacUsuarios;
use yii\db\Query;

/**
 * This is the model class for table "cac_ventas".
 *
 * @property integer $ventiden
 * @property integer $cac_lagunas_especies_laesinde
 * @property integer $cac_usuarios_usuaiden_cl
 * @property integer $cac_usuarios_usuaiden_us
 * @property string $ventfech
 * @property double $venttota
 * @property integer $usuamodi
 * @property string $fechmodi
 *
 * @property CacUsuarios $cacUsuariosUsuaidenUs
 * @property CacUsuarios $cacUsuariosUsuaidenCl
 * @property CacLagunasEspecies $cacLagunasEspeciesLaesinde
 */
class CacVentas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cac_ventas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cac_lagunas_especies_laesiden', 'cac_usuarios_usuaiden_cl', 'cac_usuarios_usuaiden_us'], 'required'],
            [['cac_lagunas_especies_laesiden', 'cac_usuarios_usuaiden_cl', 'cac_usuarios_usuaiden_us', 'usuamodi', 'ventcaes'], 'integer'],
            [['ventfech', 'fechmodi'], 'safe'],
            [['venttota', 'ventpres'], 'number'],
            [['cac_usuarios_usuaiden_us'], 'exist', 'skipOnError' => true, 'targetClass' => CacUsuarios::className(), 'targetAttribute' => ['cac_usuarios_usuaiden_us' => 'usuaiden']],
            [['cac_usuarios_usuaiden_cl'], 'exist', 'skipOnError' => true, 'targetClass' => CacUsuarios::className(), 'targetAttribute' => ['cac_usuarios_usuaiden_cl' => 'usuaiden']],
            [['cac_lagunas_especies_laesiden'], 'exist', 'skipOnError' => true, 'targetClass' => CacLagunasEspecies::className(), 'targetAttribute' => ['cac_lagunas_especies_laesiden' => 'laesiden']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ventiden' => 'Identificador de Venta',
            'cac_lagunas_especies_laesiden' => 'Cac Lagunas Especies Laesinde',
            'cac_usuarios_usuaiden_cl' => 'Cac Usuarios Usuaiden Cl',
            'cac_usuarios_usuaiden_us' => 'Cac Usuarios Usuaiden Us',
            'ventfech' => 'Fecha de Venta',
            'venttota' => 'Total de Venta',
            'ventcaes' => 'Cantidad de Cachamas',
            'ventpres' => 'Precio Unitario',
            'usuamodi' => 'Usuamodi',
            'fechmodi' => 'Fechmodi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCacUsuariosUsuaidenUs()
    {
        return $this->hasOne(CacUsuarios::className(), ['usuaiden' => 'cac_usuarios_usuaiden_us']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCacUsuariosUsuaidenCl()
    {
        return $this->hasOne(CacUsuarios::className(), ['usuaiden' => 'cac_usuarios_usuaiden_cl']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCacLagunasEspeciesLaesiden()
    {
        return $this->hasOne(CacLagunasEspecies::className(), ['laesiden' => 'cac_lagunas_especies_laesiden']);
    }

    public static function getListaClientes()
    {
        $opciones = CacUsuarios::find()->where(['cac_tipoUsuarios_tiusiden' => 4])->asArray()->all();
        return ArrayHelper::map($opciones, 'usuaiden', 'usuanomb');
    }

    public static function getListaLagunasProduccion()
    {
        $opciones = (new Query())
            ->select('a.*, b.*')
            ->from('cac_lagunas_especies a, cac_lagunas b')
            ->where('a.cac_lagunas_laguiden = b.laguiden')
            ->all();
        return ArrayHelper::map($opciones, 'laesiden', 'lagunomb');
    }

    public static function getTotalVentasAno($anho){
        $venta = CacVentas::find()->where(['YEAR(ventfech)' => $anho])->sum('venttota');
        if ($venta == '') {
          $venta = 0;
        }
        else {
          $venta = floatval($venta);
        }
        return $venta;
    }

    public static function getVentasMes($anho){
        $vectorMeses = [];
        for ($i=0; $i < 12; $i++) {
          $vectorMeses[$i] = CacVentas::find()
                    ->where(['MONTH(ventfech)' => $i])
                    ->andwhere(['YEAR(ventfech)' => $anho])
                    ->sum('venttota');
          if ($vectorMeses[$i] == '') {
            $vectorMeses[$i] = 0;
          }
          else {
            $vectorMeses[$i] = floatval($vectorMeses[$i]);
          }
        }
        return $vectorMeses;
    }
}
