<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use app\models\CacProveedores;
use yii\db\Query;

/**
 * This is the model class for table "cac_especies".
 *
 * @property integer $espeiden
 * @property integer $cac_proveedores_providen
 * @property string $espenomb
 * @property string $especara
 * @property resource $espeimag
 * @property integer $usuamodi
 * @property string $fechmodi
 *
 * @property CacCompras[] $cacCompras
 * @property CacProveedores $cacProveedoresProviden
 * @property CacLagunasEspecies[] $cacLagunasEspecies
 */
class CacEspecies extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cac_especies';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cac_proveedores_providen', 'espenomb'], 'required'],
            [['cac_proveedores_providen', 'usuamodi'], 'integer'],
            [['fechmodi'], 'safe'],
            [['espenomb'], 'string', 'max' => 50],
            [['especara'], 'string', 'max' => 300],
            [['especodi'], 'string', 'max' => 30],
            [['espeimag'], 'file', 'extensions' => 'jpg, jpeg, gif, png, bmp', 'mimeTypes' => 'image/jpeg, image/gif, image/png, image/bmp', 'skipOnEmpty' => true, 'maxSize' => 1024000, 'tooBig' => 'Tamaño de Imágen Máximo 1MB'],
            [['cac_proveedores_providen'], 'exist', 'skipOnError' => true, 'targetClass' => CacProveedores::className(), 'targetAttribute' => ['cac_proveedores_providen' => 'providen']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'espeiden' => 'Identificador de la Especie',
            'cac_proveedores_providen' => 'Proveedor',
            'espenomb' => 'Nombre de la Especie',
            'especara' => 'Características de la Especie',
            'especodi' => 'Especodi',
            'espeimag' => 'Espeimag',
            'usuamodi' => 'Usuamodi',
            'fechmodi' => 'Fechmodi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCacCompras()
    {
        return $this->hasMany(CacCompras::className(), ['cac_especies_espeiden' => 'espeiden']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCacProveedoresProviden()
    {
        return $this->hasOne(CacProveedores::className(), ['providen' => 'cac_proveedores_providen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCacLagunasEspecies()
    {
        return $this->hasMany(CacLagunasEspecies::className(), ['cac_especies_espeiden' => 'espeiden']);
    }

    public static function getListaProveedores()
    {
      $opciones = CacProveedores::find()->where(['cac_tipoProveedores_tipriden'=>3])->all();
      return ArrayHelper::map($opciones, 'providen', 'provnomb');
    }
}
