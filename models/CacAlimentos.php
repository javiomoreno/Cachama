<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use app\models\CacProveedores;
use yii\db\Query;

/**
 * This is the model class for table "cac_alimentos".
 *
 * @property integer $alimiden
 * @property integer $cac_proveedores_providen
 * @property string $alimnomb
 * @property string $alimdesc
 * @property resource $alimimag
 * @property integer $usuamodi
 * @property string $fechmodi
 *
 * @property CacProveedores $cacProveedoresProviden
 * @property CacCompras[] $cacCompras
 */
class CacAlimentos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cac_alimentos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cac_proveedores_providen'], 'required'],
            [['cac_proveedores_providen', 'usuamodi'], 'integer'],
            [['fechmodi'], 'safe'],
            [['alimnomb'], 'string', 'max' => 50],
            [['alimdesc'], 'string', 'max' => 200],
            [['alimcodi'], 'string', 'max' => 30],
            [['alimimag'], 'file', 'extensions' => 'jpg, jpeg, gif, png, bmp', 'mimeTypes' => 'image/jpeg, image/gif, image/png, image/bmp', 'skipOnEmpty' => true, 'maxSize' => 1024000, 'tooBig' => 'Tamaño de Imágen Máximo 1MB'],
            [['cac_proveedores_providen'], 'exist', 'skipOnError' => true, 'targetClass' => CacProveedores::className(), 'targetAttribute' => ['cac_proveedores_providen' => 'providen']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'alimiden' => 'Identificador del Alimento',
            'cac_proveedores_providen' => 'Proveedor',
            'alimnomb' => 'Nombre del Alimento',
            'alimdesc' => 'Descripción del Alimento',
            'alimimag' => 'Alimimag',
            'alimcodi' => 'Alimcodi',
            'usuamodi' => 'Usuamodi',
            'fechmodi' => 'Fechmodi',
        ];
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
    public function getCacCompras()
    {
        return $this->hasMany(CacCompras::className(), ['cac_alimentos_alimiden' => 'alimiden']);
    }

    public static function getListaProveedores()
    {
      $opciones = CacProveedores::find()->where(['cac_tipoProveedores_tipriden'=>2])->all();
      return ArrayHelper::map($opciones, 'providen', 'provnomb');
    }
}
