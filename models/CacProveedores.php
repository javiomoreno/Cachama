<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use app\models\CacTipoProveedores;

/**
 * This is the model class for table "cac_proveedores".
 *
 * @property integer $providen
 * @property integer $cac_tipoProveedores_tipriden
 * @property string $provnomb
 * @property string $provrif
 * @property string $provdire
 * @property string $provtele
 * @property string $provemai
 * @property resource $provcodi
 * @property resource $provimag
 * @property integer $usuamodi
 * @property string $fechmodi
 *
 * @property CacAlimentos[] $cacAlimentos
 * @property CacEquipos[] $cacEquipos
 * @property CacEspecies[] $cacEspecies
 * @property CacTipoProveedores $cacTipoProveedoresTipriden
 */
class CacProveedores extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cac_proveedores';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cac_tipoProveedores_tipriden', 'provrif', 'provnomb', 'provtele', 'provdire', 'provemai'], 'required'],
            [['cac_tipoProveedores_tipriden', 'usuamodi'], 'integer'],
            [['fechmodi'], 'safe'],
            [['provnomb', 'provtele', 'provemai'], 'string', 'max' => 50],
            [['provrif'], 'string', 'max' => 20],
            [['provcodi'], 'string', 'max' => 30],
            [['provdire'], 'string', 'max' => 200],
            ['provemai', 'email'],
            ['provimag', 'file', 'extensions' => 'jpg, jpeg, gif, png, bmp', 'mimeTypes' => 'image/jpeg, image/gif, image/png, image/bmp', 'skipOnEmpty' => true, 'maxSize' => 1024000, 'tooBig' => 'Tamaño de Imágen Máximo 1MB'],
            [['cac_tipoProveedores_tipriden'], 'exist', 'skipOnError' => true, 'targetClass' => CacTipoProveedores::className(), 'targetAttribute' => ['cac_tipoProveedores_tipriden' => 'tipriden']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'providen' => 'Identificador de Proveedor',
            'cac_tipoProveedores_tipriden' => 'Tipo de Proveedor',
            'cacTipoProveedoresTipriden.tiprnomb' => 'Tipo de Proveedor',
            'provnomb' => 'Nombre del Proveedor',
            'provrif' => 'Rif del Proveedor',
            'provdire' => 'Dirección del Proveedor',
            'provtele' => 'Teléfono del Proveedor',
            'provemai' => 'Email del Proveedor',
            'provcodi' => 'Provcodi',
            'provimag' => 'Provimag',
            'usuamodi' => 'Usuamodi',
            'fechmodi' => 'Fechmodi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCacAlimentos()
    {
        return $this->hasMany(CacAlimentos::className(), ['cac_proveedores_providen' => 'providen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCacEquipos()
    {
        return $this->hasMany(CacEquipos::className(), ['cac_proveedores_providen' => 'providen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCacEspecies()
    {
        return $this->hasMany(CacEspecies::className(), ['cac_proveedores_providen' => 'providen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCacTipoProveedoresTipriden()
    {
        return $this->hasOne(CacTipoProveedores::className(), ['tipriden' => 'cac_tipoProveedores_tipriden']);
    }

    public static function getListaTipoProveedores()
    {
        $opciones = CacTipoProveedores::find()->asArray()->all();
        return ArrayHelper::map($opciones, 'tipriden', 'tiprnomb');
    }

}
