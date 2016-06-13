<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cac_compras".
 *
 * @property integer $compiden
 * @property integer $cac_usuarios_usuaiden
 * @property integer $cac_alimentos_alimiden
 * @property integer $cac_especies_espeiden
 * @property integer $cac_equipos_equiiden
 * @property string $compfech
 * @property double $comptota
 * @property integer $compcant
 * @property integer $usuamodi
 * @property string $fechmodi
 *
 * @property CacEquipos $cacEquiposEquiiden
 * @property CacEspecies $cacEspeciesEspeiden
 * @property CacAlimentos $cacAlimentosAlimiden
 * @property CacUsuarios $cacUsuariosUsuaiden
 */
class CacCompras extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cac_compras';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cac_usuarios_usuaiden', 'compfech', 'compprun', 'compcant'], 'required'],
            [['cac_usuarios_usuaiden', 'cac_alimentos_alimiden', 'cac_especies_espeiden', 'cac_equipos_equiiden', 'compcant', 'usuamodi'], 'integer'],
            [['compfech', 'fechmodi'], 'safe'],
            [['comptota', 'compprun'], 'number'],
            [['cac_equipos_equiiden'], 'exist', 'skipOnError' => true, 'targetClass' => CacEquipos::className(), 'targetAttribute' => ['cac_equipos_equiiden' => 'equiiden']],
            [['cac_especies_espeiden'], 'exist', 'skipOnError' => true, 'targetClass' => CacEspecies::className(), 'targetAttribute' => ['cac_especies_espeiden' => 'espeiden']],
            [['cac_alimentos_alimiden'], 'exist', 'skipOnError' => true, 'targetClass' => CacAlimentos::className(), 'targetAttribute' => ['cac_alimentos_alimiden' => 'alimiden']],
            [['cac_usuarios_usuaiden'], 'exist', 'skipOnError' => true, 'targetClass' => CacUsuarios::className(), 'targetAttribute' => ['cac_usuarios_usuaiden' => 'usuaiden']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'compiden' => 'Compiden',
            'cac_usuarios_usuaiden' => 'Cac Usuarios Usuaiden',
            'cac_alimentos_alimiden' => 'Cac Alimentos Alimiden',
            'cac_especies_espeiden' => 'Cac Especies Espeiden',
            'cac_equipos_equiiden' => 'Cac Equipos Equiiden',
            'compfech' => 'Compfech',
            'comptota' => 'Comptota',
            'compprun' => 'Compprun',
            'compcant' => 'Compcant',
            'usuamodi' => 'Usuamodi',
            'fechmodi' => 'Fechmodi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCacEquiposEquiiden()
    {
        return $this->hasOne(CacEquipos::className(), ['equiiden' => 'cac_equipos_equiiden']);
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
    public function getCacAlimentosAlimiden()
    {
        return $this->hasOne(CacAlimentos::className(), ['alimiden' => 'cac_alimentos_alimiden']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCacUsuariosUsuaiden()
    {
        return $this->hasOne(CacUsuarios::className(), ['usuaiden' => 'cac_usuarios_usuaiden']);
    }

    public static function getEspeciesAno($anho){
      $vectorEspecies = [];
      for ($i=0; $i < 12; $i++) {
        $vectorEspecies[$i] = CacCompras::find()
                  ->where(['MONTH(compfech)' => $i])
                  ->andwhere(['YEAR(compfech)' => $anho])
                  ->andwhere(['not', ['cac_especies_espeiden' => null]])
                  ->sum('comptota');
        if ($vectorEspecies[$i] == '') {
          $vectorEspecies[$i] = 0;
        }
        else {
          $vectorEspecies[$i] = floatval($vectorEspecies[$i]);
        }
      }
      return $vectorEspecies;
    }

    public static function getEquiposAno($anho){
      $vectorEquipos = [];
      for ($i=0; $i < 12; $i++) {
        $vectorEquipos[$i] = CacCompras::find()
                  ->where(['MONTH(compfech)' => $i])
                  ->andwhere(['YEAR(compfech)' => $anho])
                  ->andwhere(['not', ['cac_equipos_equiiden' => null]])
                  ->sum('comptota');
        if ($vectorEquipos[$i] == '') {
          $vectorEquipos[$i] = 0;
        }
        else {
          $vectorEquipos[$i] = floatval($vectorEquipos[$i]);
        }
      }
      return $vectorEquipos;
    }

    public static function getAlimentosAno($anho){
      $vectorAlimentos = [];
      for ($i=0; $i < 12; $i++) {
        $vectorAlimentos[$i] = CacCompras::find()
                  ->where(['MONTH(compfech)' => $i])
                  ->andwhere(['YEAR(compfech)' => $anho])
                  ->andwhere(['not', ['cac_alimentos_alimiden' => null]])
                  ->sum('comptota');
        if ($vectorAlimentos[$i] == '') {
          $vectorAlimentos[$i] = 0;
        }
        else {
          $vectorAlimentos[$i] = floatval($vectorAlimentos[$i]);
        }
      }
      return $vectorAlimentos;
    }
}
