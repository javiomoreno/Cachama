<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use app\models\CacProveedores;
use yii\db\Query;

/**
 * This is the model class for table "cac_equipos".
 *
 * @property integer $equiiden
 * @property integer $cac_proveedores_providen
 * @property string $equinomb
 * @property string $equidesc
 * @property resource $equiimag
 * @property integer $usuamodi
 * @property string $fechmodi
 *
 * @property CacCompras[] $cacCompras
 * @property CacProveedores $cacProveedoresProviden
 */
class CacEquipos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cac_equipos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cac_proveedores_providen', 'equinomb'], 'required'],
            [['cac_proveedores_providen', 'usuamodi'], 'integer'],
            [['fechmodi'], 'safe'],
            [['equinomb'], 'string', 'max' => 50],
            [['equidesc'], 'string', 'max' => 200],
            [['equicodi'], 'string', 'max' => 30],
            [['equiimag'], 'file', 'extensions' => 'jpg, jpeg, gif, png, bmp', 'mimeTypes' => 'image/jpeg, image/gif, image/png, image/bmp', 'skipOnEmpty' => true, 'maxSize' => 1024000, 'tooBig' => 'Tamaño de Imágen Máximo 1MB'],
            [['cac_proveedores_providen'], 'exist', 'skipOnError' => true, 'targetClass' => CacProveedores::className(), 'targetAttribute' => ['cac_proveedores_providen' => 'providen']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'equiiden' => 'Identificador del Equipo',
            'cac_proveedores_providen' => 'Proveedor',
            'equinomb' => 'Nombre del Equipo',
            'equidesc' => 'Descripción del Equipo',
            'equicodi' => 'Equicodi',
            'equiimag' => 'Equiimag',
            'usuamodi' => 'Usuamodi',
            'fechmodi' => 'Fechmodi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCacCompras()
    {
        return $this->hasMany(CacCompras::className(), ['cac_equipos_equiiden' => 'equiiden']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCacProveedoresProviden()
    {
        return $this->hasOne(CacProveedores::className(), ['providen' => 'cac_proveedores_providen']);
    }

    public static function getListaProveedores()
    {
        $opciones = CacProveedores::find()->where(['cac_tipoProveedores_tipriden'=>1])->all();
        return ArrayHelper::map($opciones, 'providen', 'provnomb');
    }
}
