<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CacLagunas */

$this->title = $model->usuanomb;
$base64 = $model->usuacodi."".base64_encode($model->usuaimag);

?>
<div class="cac-clientes-view">
  <div class="row" style="margin-left: -30px; margin-right: -30px;">
    <div class="breadcrumbs">
      <ul class="breadcrumb">
        <li>
          <i class="ace-icon fa fa-edit green"></i>
          <a href="#">Registrar</a>
        </li>
        <li>
          <?= Html::a('Empleados', ['index'], '' ); ?>
        </li>
        <li class="active">Detalle del Empleado</li>
      </ul><!-- /.breadcrumb -->
    </div>
  </div>
  <div class="row">
      <div class="page-header" style="text-align:left; height: 60px; padding-top: 20px;">
          <div class="col-lg-6">
              <h1>Detalle del Empleado</h1>
          </div>
          <div class="col-lg-6" style="text-align:right;">
            <?= Html::a('Nuevo Empleado', ['create'], ['class' => 'btn btn-success']) ?>
          </div>
      </div>
  </div>

  <div class="row">
    <div class="col-lg-12">
        <div class="panel panel-green">
            <div class="panel-heading">
                <?= $model->usuanomb." ".$model->usuaapel;?>
            </div>
            <div class="panel-body">
              <div class="col-lg-8">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        [                      // the owner name of the model
                            'label' => 'Identificador Cliente',
                            'value' => $model->usuaiden,
                        ],
                        [                      // the owner name of the model
                            'label' => 'Nombre del Cliente',
                            'value' => $model->usuanomb,
                        ],
                        [                      // the owner name of the model
                            'label' => 'Apellido del Cliente',
                            'value' => $model->usuaapel,
                        ],
                        [                      // the owner name of the model
                            'label' => 'Cédula del Cliente',
                            'value' => $model->usuacedu,
                        ],
                        [                      // the owner name of the model
                            'label' => 'Teléfono del Cliente',
                            'value' => $model->usuatele,
                        ],
                        [                      // the owner name of the model
                            'label' => 'Sexo del Cliente',
                            'value' => $model->cacSexosSexoiden->sexonomb,
                        ],
                        [                      // the owner name of the model
                            'label' => 'Dirección del Cliente',
                            'value' => $model->usuadire,
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
              <div style="text-align: center;">
                <?= Html::a('Editar', ['update', 'id' => $model->usuaiden], ['class' => 'btn btn-primary', 'style' => 'color:#fff']) ?>
                <?= Html::a('Eliminar', ['delete', 'id' => $model->usuaiden], [
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
