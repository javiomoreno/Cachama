<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\ActiveRecord;
use app\models\CacUsuarios;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\CacLagunasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Especies';
$usuario =  CacUsuarios::findIdentity(\Yii::$app->user->getId());

?>
<div class="cac-especies-index">

  <div class="row" style="margin-left: -30px; margin-right: -30px;">
    <div class="breadcrumbs">
      <ul class="breadcrumb">
        <li>
          <i class="ace-icon fa fa-th-list green"></i>
          <a href="#">Inventario</a>
        </li>
        <li class="active">Lista de Especies</li>
      </ul><!-- /.breadcrumb -->
      <div class="nombre-usuario">
        Bienvenido, <?= $usuario->usuanomb." ".$usuario->usuaapel;?>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="page-header" style="text-align:left; height: 60px; padding-top: 20px;">
        <div class="col-lg-6">
            <h1>Lista de Especies</h1>
        </div>
        <div class="col-lg-6" style="text-align:right;">
          <?= Html::a('Nuevo Especie', ['create'], ['class' => 'btn btn-success']) ?>
        </div>
    </div>
  </div>
  <div class="row">
    <div class="panel panel-default">
        <div class="panel-heading" style="background-color: rgba(92, 184, 92, 0.61);color: #FFF;font-weight: bold;">
            Registro de Especies
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="dataTable_wrapper">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr style="background-color: #5CB85C;color: #fff;">
                            <th>Nombre</th>
                            <th>Características</th>
                            <th>Proveedor</th>
                            <th style="width:10%">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($model as $value): ?>
                        <tr class="odd gradeX">
                            <td><?= $value->espenomb;?></td>
                            <td><?= $value->especara;?></td>
                            <td><?= $value->cacProveedoresProviden->provnomb;?></td>
                            <td style="text-align: center;">
                              <?= Html::a(Html::tag('span', '', ['class' => 'glyphicon glyphicon-eye-open green']).'', ['cac-especies/view?id='.$value->espeiden], '' );?>
                              <?= Html::a(Html::tag('span', '', ['class' => 'glyphicon glyphicon-pencil blue']).'', ['/cac-especies/update?id='.$value->espeiden], '' );?>
                              <?= Html::a(Html::tag('span', '', ['class' => 'glyphicon glyphicon-trash red']).'', ['/cac-especies/delete?id='.$value->espeiden], ['data-method' => 'post'] );?>
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
