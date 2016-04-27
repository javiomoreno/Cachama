<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\CacUsuarios;

/* @var $this yii\web\View */
/* @var $model app\models\CacLagunas */

$this->title = "Fecha: ".$model->ventfech;
$usuario =  CacUsuarios::findIdentity(\Yii::$app->user->getId());
?>
<div class="cac-equipos-view">
  <div class="row" style="margin-left: -30px; margin-right: -30px;">
    <div class="breadcrumbs">
      <ul class="breadcrumb">
        <li>
          <i class="ace-icon fa fa-dollar green"></i>
          <a href="#">Ventas</a>
        </li>
        <li>
          <?= Html::a('Ventas', ['index'], '' ); ?>
        </li>
        <li class="active">Detalle de Venta</li>
      </ul><!-- /.breadcrumb -->
      <div class="nombre-usuario">
        Bienvenido, <?= $usuario->usuanomb." ".$usuario->usuaapel;?>
      </div>
    </div>
  </div>
  <div class="row">
      <div class="page-header" style="text-align:left; height: 60px; padding-top: 20px;">
          <div class="col-lg-6">
              <h1>Detalle de Venta</h1>
          </div>
      </div>
  </div>

  <div class="row">
    <div class="col-lg-12">
        <div class="panel panel-green">
            <div class="panel-heading">
                Fecha: <?= $model->ventfech;?>
            </div>
            <div class="panel-body">
              <div class="col-lg-18">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'ventiden',
                        [
                            'label' => 'Laguna',
                            'value' => $model->cacLagunasEspeciesLaesiden->cacLagunasLaguiden->lagunomb,
                        ],
                        [
                            'label' => 'Cliente',
                            'value' => $model->cacUsuariosUsuaidenCl->usuanomb,
                        ],
                        'ventcaes',
                        'ventpres',
                        'venttota',
                    ],
                ]) ?>
              </div>
              <div class="col-lg-4">
              </div>
            </div>
            <div class="panel-footer">
            </div>
        </div>
    </div>
  </div>
</div>
<footer class="footer">
  <p class="pull-left">&copy; Cachamas <?= date('Y') ?></p>

  <p class="pull-right"><?= Yii::powered() ?></p>
</footer>
