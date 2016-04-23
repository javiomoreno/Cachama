<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MidUsuarios */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'Perfil de Usuario';
?>

<div class="mid-usuarios-form">
  <div class="container">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
      <div class="col-xs-6 col-md-3">
        <a href="#" class="thumbnail">
          <?php if ($model->mid_sexos_sexoiden == 1): ?>
            <img src="../imagenes/mujer.png" alt="Perfil">
          <?php elseif($model->mid_sexos_sexoiden == 2): ?>
            <img src="../imagenes/hombre.jpg" alt="Perfil">
          <?php endif; ?>
        </a>
        <div class="caption">
          <h3><?= $model->usuanomb." ". $model->usuaapel?></h3>
          <p><?= $model->usuaemai?></p>
        </div>
      </div>
      <div class="col-xs-6 col-md-9">
        <div class="row">
          <div class="col-lg-12">
            <p style="font-weight: bold; float: left; padding-right: 10px;">Usuario de Conexión:</p> <?= $model->usuauser;?>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <p style="font-weight: bold; float: left; padding-right: 10px;">Telefono:</p> <?= $model->usuatele;?>
          </div>
          <div class="col-lg-6">
            <p style="font-weight: bold; float: left; padding-right: 10px;">Cedula:</p> <?= $model->usuacedu;?>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <p style="font-weight: bold; float: left; padding-right: 10px;">Tipo de Usuario:</p> <?= $model->midTiposUsuariosTiusiden['tiusnomb'];?>
          </div>
          <div class="col-lg-6">
            <p style="font-weight: bold; float: left; padding-right: 10px;">Sexo:</p> <?= $model->midSexosSexoiden['sexonomb'];?>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <p style="font-weight: bold;">Dirección:</p> <?= $model->usuadire;?>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12" style="padding-top: 40px;">
            <?= Html::a('Editar Perfil', ['/usuario/editar-perfil'], ['class' => 'btn btn-success']) ?>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
