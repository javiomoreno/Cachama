<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\CacUsuarios;

/* @var $this yii\web\View */
/* @var $model app\models\CacLagunas */

$this->title = $model->provnomb;
$base64 = $model->provcodi."".base64_encode($model->provimag);
$usuario =  CacUsuarios::findIdentity(\Yii::$app->user->getId());

?>
<div class="cac-lagunas-view">
  <div class="row" style="margin-left: -30px; margin-right: -30px;">
    <div class="breadcrumbs">
      <ul class="breadcrumb">
        <li>
          <i class="ace-icon fa fa-edit green"></i>
          <a href="#">Registrar</a>
        </li>
        <li>
          <?= Html::a('Proveedores', ['index'], '' ); ?>
        </li>
        <li class="active">Detalle de Proveedor</li>
      </ul><!-- /.breadcrumb -->
      <div class="nombre-usuario">
        Bienvenido, <?= $usuario->usuanomb." ".$usuario->usuaapel;?>
      </div>
    </div>
  </div>
  <div class="row">
      <div class="page-header" style="text-align:left; height: 60px; padding-top: 20px;">
          <div class="col-lg-6">
              <h1>Detalle de Proveedor</h1>
          </div>
          <div class="col-lg-6" style="text-align:right;">
            <?= Html::a('Nuevo Proveedor', ['create'], ['class' => 'btn btn-success']) ?>
          </div>
      </div>
  </div>

  <div class="row">
    <div class="col-lg-12">
        <div class="panel panel-green">
            <div class="panel-heading">
                <?= $model->provnomb;?>
            </div>
            <div class="panel-body">
              <div class="col-lg-8">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'providen',
                        'cacTipoProveedoresTipriden.tiprnomb',
                        'provnomb',
                        'provrif',
                        'provdire',
                        'provtele',
                        'provemai',
                    ],
                ]) ?>
              </div>
              <div class="col-lg-4">
                <div class="imagen">
                  <img src=<?= $base64;?> height="100%" width="100%" />
                </div>
              </div>
            </div>
            <div class="panel-footer">
              <div style="text-align: center;">
                <?= Html::a('Editar', ['update', 'id' => $model->providen], ['class' => 'btn btn-primary', 'style' => 'color:#fff']) ?>
                <?= Html::a('Eliminar', ['delete', 'id' => $model->providen], [
                    'class' => 'btn btn-danger',
                    'style' => 'color:#fff',
                    'data' => [
                        'confirm' => '¿Seguro desea Eliminar el Registro?',
                        'method' => 'post',
                    ],
                ]) ?>
              </div>
            </div>
        </div>
    </div>
  </div>
</div>
<footer class="footer">
  <p class="pull-left">&copy; Cachamas <?= date('Y') ?></p>

  <p class="pull-right"><?= Yii::powered() ?></p>
</footer>
