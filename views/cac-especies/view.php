<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\CacUsuarios;

/* @var $this yii\web\View */
/* @var $model app\models\CacLagunas */

$this->title = $model->espenomb;
$base64 = $model->especodi."".base64_encode($model->espeimag);
$usuario =  CacUsuarios::findIdentity(\Yii::$app->user->getId());
?>
<div class="cac-equipos-view">
  <div class="row" style="margin-left: -30px; margin-right: -30px;">
    <div class="breadcrumbs">
      <ul class="breadcrumb">
        <li>
          <i class="ace-icon fa fa-th-list green"></i>
          <a href="#">Inventario</a>
        </li>
        <li>
          <?= Html::a('Especies', ['index'], '' ); ?>
        </li>
        <li class="active">Detalle de la Especie</li>
      </ul><!-- /.breadcrumb -->
      <div class="nombre-usuario">
        Bienvenido, <?= $usuario->usuanomb." ".$usuario->usuaapel;?>
      </div>
    </div>
  </div>
  <div class="row">
      <div class="page-header" style="text-align:left; height: 60px; padding-top: 20px;">
          <div class="col-lg-6">
              <h1>Detalle de la Especie</h1>
          </div>
          <div class="col-lg-6" style="text-align:right;">
            <?= Html::a('Nueva Especie', ['create'], ['class' => 'btn btn-success']) ?>
          </div>
      </div>
  </div>

  <div class="row">
    <div class="col-lg-12">
        <div class="panel panel-green">
            <div class="panel-heading">
                <?= $model->espenomb;?>
            </div>
            <div class="panel-body">
              <div class="col-lg-8">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'espeiden',
                        'cacProveedoresProviden.provnomb',
                        'espenomb',
                        'especara',
                        [
                          'label' => 'Cantidad de Equipos',
                          'value' => $model2->compcant,
                        ],
                        [
                          'label' => 'Precio Unitario',
                          'value' => $model2->compprun,
                        ],
                        [
                          'label' => 'Fecha de Compra',
                          'value' => $model2->compfech,
                        ],
                        [
                          'label' => 'Total de Compra',
                          'value' => $model2->comptota,
                        ],
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
              
            </div>
        </div>
    </div>
  </div>
</div>
<footer class="footer">
  <p class="pull-left">&copy; Cachamas <?= date('Y') ?></p>

  <p class="pull-right"><?= Yii::powered() ?></p>
</footer>
