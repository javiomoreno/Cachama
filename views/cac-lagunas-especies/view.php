
<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\CacUsuarios;

/* @var $this yii\web\View */
/* @var $model app\models\CacLagunas */

$this->title = $model->cacLagunasLaguiden->lagunomb;
$base64 = $model->cacLagunasLaguiden->lagucodi."".base64_encode($model->cacLagunasLaguiden->laguimag);
$usuario =  CacUsuarios::findIdentity(\Yii::$app->user->getId());

?>
<div class="cac-lagunas-especies-view">
  <div class="row" style="margin-left: -30px; margin-right: -30px;">
    <div class="breadcrumbs">
      <ul class="breadcrumb">
        <li>
          <i class="ace-icon fa fa-th-list green"></i>
          <a href="#">Inventario</a>
        </li>
        <li>
          <?= Html::a('Lagunas', ['index'], '' ); ?>
        </li>
        <li class="active">Detalle de Laguna en Producción</li>
      </ul><!-- /.breadcrumb -->
      <div class="nombre-usuario">
        Bienvenido, <?= $usuario->usuanomb." ".$usuario->usuaapel;?>
      </div>
    </div>
  </div>
  <div class="row">
      <div class="page-header" style="text-align:left; height: 60px; padding-top: 20px;">
          <div class="col-lg-6">
              <h1>Detalle de Laguna en Producción</h1>
          </div>
          <div class="col-lg-6" style="text-align:right;">
            <?= Html::a('Nueva Laguna en Producción', ['create'], ['class' => 'btn btn-success']) ?>
          </div>
      </div>
  </div>

  <div class="row">
    <div class="col-lg-12">
        <div class="panel panel-green">
            <div class="panel-heading">
                <?= $model->cacLagunasLaguiden->lagunomb;?>
            </div>
            <div class="panel-body">
              <div class="col-lg-8">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'laesiden',
                        [
                            'label' => 'Laguna',
                            'value' => $model->cacLagunasLaguiden->lagunomb,
                        ],
                        [
                            'label' => 'Especie de Cachama',
                            'value' => $model->cacEspeciesEspeiden->espenomb,
                        ],
                        [
                            'label' => 'Total Inicial',
                            'value' => $model->laestota." Cachamas",
                        ],
                        [
                            'label' => 'Total Disponible',
                            'value' => $model->laesdisp." Cachamas",
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
