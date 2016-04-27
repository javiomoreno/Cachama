<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\ActiveRecord;
use app\models\CacUsuarios;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\CacLagunasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$usuario =  CacUsuarios::findIdentity(\Yii::$app->user->getId());
$this->title = 'Lagunas';
?>
<div class="cac-lagunas-index">

  <div class="row" style="margin-left: -30px; margin-right: -30px;">
    <div class="breadcrumbs">
      <ul class="breadcrumb">
        <li>
          <i class="ace-icon fa fa-th-list green"></i>
          <a href="#">Inventario</a>
        </li>
        <li class="active">Lista de Lagunas</li>
      </ul><!-- /.breadcrumb -->
      <div class="nombre-usuario">
        Bienvenido, <?= $usuario->usuanomb." ".$usuario->usuaapel;?>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="page-header" style="text-align:left; height: 60px; padding-top: 20px;">
        <div class="col-lg-6">
            <h1>Lista de Lagunas</h1>
        </div>
        <div class="col-lg-6" style="text-align:right;">
          <?= Html::a('Nueva Laguna', ['create'], ['class' => 'btn btn-success']) ?>
        </div>
    </div>
  </div>
  <div class="row">
    <div class="panel panel-default">
        <div class="panel-heading" style="background-color: rgba(92, 184, 92, 0.61);color: #FFF;font-weight: bold;">
            Registro de Lagunas
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="dataTable_wrapper">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr style="background-color: #5CB85C;color: #fff;">
                            <th>Nombre</th>
                            <th>Tamaño (m2)</th>
                            <th>Capacidad</th>
                            <th>Descripción</th>
                            <th style="width:10%">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($model as $value): ?>
                        <tr class="odd gradeX">
                            <td><?= $value->lagunomb;?></td>
                            <td><?= $value->lagutama;?></td>
                            <td><?= $value->lagucapa;?></td>
                            <td><?= $value->lagudesc;?></td>
                            <td style="text-align: center;">
                              <?= Html::a(Html::tag('span', '', ['class' => 'glyphicon glyphicon-eye-open green']).'', ['cac-lagunas/view?id='.$value->laguiden], '' );?>
                              <?= Html::a(Html::tag('span', '', ['class' => 'glyphicon glyphicon-pencil blue']).'', ['/cac-lagunas/update?id='.$value->laguiden], '' );?>
                              <?= Html::a(Html::tag('span', '', ['class' => 'glyphicon glyphicon-trash red']).'', ['/cac-lagunas/delete?id='.$value->laguiden], ['data-method' => 'post'] );?>
                            </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
  </div>
</div>
<footer class="footer">
  <p class="pull-left">&copy; Cachamas <?= date('Y') ?></p>
  <p class="pull-right"><?= Yii::powered() ?></p>
</footer>
<script>
$(document).ready(function() {
    $('#dataTables-example').DataTable({
            responsive: true,
            "language": {
              "lengthMenu": "_MENU_ Registros por pantalla",
              "zeroRecords": "No Hay Datos - Disculpe",
              "info": "Vista página _PAGE_ de _PAGES_",
              "infoEmpty": "No hay registros disponibles",
              "infoFiltered": "(filtered from _MAX_ total records)",
              "sSearch": "Buscar:",
              "oPaginate": {
                  "sFirst":    "First",
                  "sLast":     "Last",
                  "sNext":     "Siguiente",
                  "sPrevious": "Anterior"
              },
            },
            "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "Todos"]]
    });
});
</script>
