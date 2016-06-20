<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\CacUsuarios;
use miloschuman\highcharts\Highcharts;

/* @var $this yii\web\View */
/* @var $model app\models\CacLagunas */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Reporte Ventas | Cachamas';
$usuario =  CacUsuarios::findIdentity(\Yii::$app->user->getId());
?>

<div class="cac-reportes-ventas-form">
    <div class="row" style="margin-left: -30px; margin-right: -30px;">
      <div class="breadcrumbs">
        <ul class="breadcrumb">
          <li>
            <i class="ace-icon fa fa-file-o green"></i>
            <a href="#">Reportes</a>
          </li>
          <li class="active">Ventas</li>
        </ul><!-- /.breadcrumb -->
        <div class="nombre-usuario">
          Bienvenido, <?= $usuario->usuanomb." ".$usuario->usuaapel;?>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="page-header" style="text-align:left; height: 60px; padding-top: 20px;">
          <div class="col-lg-12">
              <h1>Reporte de Ventas</h1>
          </div>
      </div>
    </div>
    <div class="row">
      <?= Highcharts::widget([
           'options' => [
             'chart' => [
                 'plotBackgroundColor' => null,
                 'plotBorderWidth' => null,
                 'plotShadow' => false,
                 'type' => 'pie'
               ],
               'title' => [
                   'text' => 'Ventas del Año 2016'
               ],
               'tooltip' => [
                   'pointFormat' => '{series.name}: <b>{point.percentage:.1f}%</b>'
               ],
               'plotOptions' => [
                   'pie' => [
                       'allowPointSelect' => true,
                       'cursor' => 'pointer',
                       'dataLabels' => [
                           'enabled' => false
                       ],
                       'showInLegend' => true
                   ]
               ],
              'series' => [
                  ['name' => 'Porcentaje', 'colorByPoint' => true,
                  'data' => [['name' =>  'Enero', 'y'=> $porcentajes[0]],
                             ['name' =>  'Febrero', 'y'=> $porcentajes[1]],
                             ['name' =>  'Marzo', 'y'=> $porcentajes[2]],
                             ['name' =>  'Abril', 'y'=> $porcentajes[3]],
                             ['name' =>  'Mayo', 'y'=> $porcentajes[4]],
                             ['name' =>  'Junio', 'y'=> $porcentajes[5]],
                             ['name' =>  'Julio', 'y'=> $porcentajes[6]],
                             ['name' =>  'Agosto', 'y'=> $porcentajes[7]],
                             ['name' =>  'Septiembre', 'y'=> $porcentajes[8]],
                             ['name' =>  'Octubre', 'y'=> $porcentajes[9]],
                             ['name' =>  'Noviembre', 'y'=> $porcentajes[10]],
                             ['name' =>  'Diciembre', 'y'=> $porcentajes[11]],
                            ],
                  ]
              ]
           ]
        ]);
      ?>
    </div>
</div>
<footer class="footer">
  <p class="pull-left">&copy; Cachamas <?= date('Y') ?></p>
  <p class="pull-right"><?= Yii::powered() ?></p>
</footer>
