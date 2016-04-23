<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use app\models\CacTiposUsuarios;
use app\models\CacSexos;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "cac_usuarios".
 *
 * @property integer $usuaiden
 * @property integer $cac_sexos_sexoiden
 * @property integer $cac_tipoUsuarios_tiusiden
 * @property string $usuanomb
 * @property string $usuaapel
 * @property string $usuacedu
 * @property string $usuatele
 * @property string $usuadire
 * @property string $usuacodi
 * @property resource $usuaimag
 * @property string $usuauser
 * @property string $usuapass
 * @property integer $usuamodi
 * @property string $fechmodi
 *
 * @property CacCompras[] $cacCompras
 * @property CacTiposUsuarios $cacTiposUsuariosTiusiden
 * @property CacSexos $cacSexosSexoiden
 * @property CacVentas[] $cacVentas
 * @property CacVentas[] $cacVentas0
 */
class CacUsuarios extends ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cac_usuarios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cac_sexos_sexoiden', 'cac_tipoUsuarios_tiusiden', 'usuanomb', 'usuaapel', 'usuacedu', 'usuatele', 'usuatele', 'usuadire'], 'required'],
            [['cac_sexos_sexoiden', 'cac_tipoUsuarios_tiusiden', 'usuamodi'], 'integer'],
            [['fechmodi'], 'safe'],
            [['usuanomb', 'usuaapel', 'usuacedu', 'usuatele', 'usuauser'], 'string', 'max' => 50],
            [['usuadire'], 'string', 'max' => 200],
            [['usuapass'], 'string', 'max' => 250],
            [['usuacodi'], 'string', 'max' => 30],
            [['usuaimag'], 'file', 'extensions' => 'jpg, jpeg, gif, png, bmp', 'mimeTypes' => 'image/jpeg, image/gif, image/png, image/bmp', 'skipOnEmpty' => true, 'maxSize' => 1024000, 'tooBig' => 'Tamaño de Imágen Máximo 1MB'],
            [['cac_tipoUsuarios_tiusiden'], 'exist', 'skipOnError' => true, 'targetClass' => CacTipoUsuarios::className(), 'targetAttribute' => ['cac_tipoUsuarios_tiusiden' => 'tiusiden']],
            [['cac_sexos_sexoiden'], 'exist', 'skipOnError' => true, 'targetClass' => CacSexos::className(), 'targetAttribute' => ['cac_sexos_sexoiden' => 'sexoiden']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'usuaiden' => 'Usuaiden',
            'cac_sexos_sexoiden' => 'Cac Sexos Sexoiden',
            'cac_tipoUsuarios_tiusiden' => 'Tipo Usuario',
            'usuanomb' => 'Usuanomb',
            'usuaapel' => 'Usuaapel',
            'usuacedu' => 'Usuacedu',
            'usuatele' => 'Usuatele',
            'usuadire' => 'Usuadire',
            'usuaimag' => 'Usuaimag',
            'usuauser' => 'Usuauser',
            'usuapass' => 'Usuapass',
            'usuamodi' => 'Usuamodi',
            'fechmodi' => 'Fechmodi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCacCompras()
    {
        return $this->hasMany(CacCompras::className(), ['cac_usuarios_usuaiden' => 'usuaiden']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCacTipoUsuariosTiusiden()
    {
        return $this->hasOne(CacTipoUsuarios::className(), ['tiusiden' => 'cac_tipoUsuarios_tiusiden']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCacSexosSexoiden()
    {
        return $this->hasOne(CacSexos::className(), ['sexoiden' => 'cac_sexos_sexoiden']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCacVentas()
    {
        return $this->hasMany(CacVentas::className(), ['cac_usuarios_usuaiden_us' => 'usuaiden']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCacVentas0()
    {
        return $this->hasMany(CacVentas::className(), ['cac_usuarios_usuaiden_cl' => 'usuaiden']);
    }

    public static function getListaTipoUsuarios()
    {
        $opciones = CacTipoUsuarios::find()->where('tiusiden != 4')->asArray()->all();
        return ArrayHelper::map($opciones, 'tiusiden', 'tiusnomb');
    }

    public static function getListaSexos()
    {
        $opciones = CacSexos::find()->asArray()->all();
        return ArrayHelper::map($opciones, 'sexoiden', 'sexonomb');
    }

    public static function findIdentity($id)
    {
        return static::findOne(['usuaiden' => $id]);
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['usuauser' => $username]);
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByEmail($usuaemai)
    {
        return static::findOne(['usuaemai' => $usuaemai]);
    }


    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
      if (base64_decode($this->usuapass) == $password) {
        return true;
      }
      return false;
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->usuapass = base64_encode($password);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @return password Decodificado
     */
    public function getPassword()
    {
        return base64_decode($this->usuapass);
    }


        /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
    }

        /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
    }
}
