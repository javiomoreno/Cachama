<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use app\models\CacSexos;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "mid_usuarios".
 *
 * @property integer $usuaiden
 * @property integer $mid_sexos_sexoiden
 * @property integer $mid_tiposUsuarios_tiusiden
 * @property string $usuanomb
 * @property string $usuaapel
 * @property string $usuacedu
 * @property string $usuatele
 * @property string $usuadire
 * @property string $usuauser
 * @property string $useapass
 *
 * @property CacCategorias[] $midCategorias
 * @property CacTiposUsuarios $midTiposUsuariosTiusiden
 * @property CacSexos $midSexosSexoiden
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
            [['cac_sexos_sexoiden', 'cac_tiposUsuarios_tiusiden'], 'required'],
            [['cac_sexos_sexoiden', 'cac_tiposUsuarios_tiusiden'], 'integer'],
            [['usuanomb', 'usuaapel', 'usuacedu', 'usuatele', 'usuauser'], 'string', 'max' => 50],
            [['usuadire'], 'string', 'max' => 200],
            [['usuapass'], 'string', 'max' => 250],
            [['usuaemai'], 'string', 'max' => 150],
            [['usuaemai'], 'unique'],
            [['usuaemai'], 'email'],
            [['cac_tiposUsuarios_tiusiden'], 'exist', 'skipOnError' => true, 'targetClass' => CacTiposUsuarios::className(), 'targetAttribute' => ['cac_tiposUsuarios_tiusiden' => 'tiusiden']],
            [['cac_sexos_sexoiden'], 'exist', 'skipOnError' => true, 'targetClass' => CacSexos::className(), 'targetAttribute' => ['cac_sexos_sexoiden' => 'sexoiden']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'usuaiden' => 'Identificador',
            'cac_sexos_sexoiden' => 'Sexo',
            'cacSexosSexoiden.sexonomb' => 'Sexo',
            'cac_tiposUsuarios_tiusiden' => 'Tipo de Usuario',
            'cacTiposUsuariosTiusiden.tiusnomb' => 'Tipo de Usuario',
            'usuanomb' => 'Nombre de Usuario',
            'usuaapel' => 'Apellido de Usuario',
            'usuacedu' => 'Cédula de Usuario',
            'usuatele' => 'Teléfono de Usuario',
            'usuadire' => 'Dirección de Usuario',
            'usuaemai' => 'Email de Usuario',
            'usuauser' => 'Usuario de Acceso',
            'usuapass' => 'Password',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCacCategorias()
    {
        return $this->hasMany(CacCategorias::className(), ['mid_usuarios_usuaiden' => 'usuaiden']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCacTiposUsuariosTiusiden()
    {
        return $this->hasOne(CacTiposUsuarios::className(), ['tiusiden' => 'mid_tiposUsuarios_tiusiden']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCacSexosSexoiden()
    {
        return $this->hasOne(CacSexos::className(), ['sexoiden' => 'mid_sexos_sexoiden']);
    }

    public static function getListaTipoUsuarios()
    {
        $opciones = CacTiposUsuarios::find()->asArray()->all();
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
