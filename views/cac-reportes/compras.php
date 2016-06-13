<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\CacUsuarios;
use miloschuman\highcharts\Highcharts;
use miloschuman\highcharts\HighchartsAsset;

/* @var $this yii\web\View */
/* @var $model app\models\CacLagunas */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'Reporte Compras | Cachamas';
$usuario =  CacUsuarios::findIdentity(\Yii::$app->user->getId());
?>

<div class="cac-reportes-compras-form">
    <div class="row" style="margin-left: -30px; margin-right: -30px;">
      <div class="breadcrumbs">
        <ul class="breadcrumb">
          <li>
            <i class="ace-icon fa fa-file-o green"></i>
            <a href="#">Reportes</a>
          </li>
          <li class="active">Compras</li>
        </ul><!-- /.breadcrumb -->
        <div class="nombre-usuario">
          Bienvenido, <?= $usuario->usuanomb." ".$usuario->usuaapel;?>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="page-header" style="text-align:left; height: 60px; padding-top: 20px;">
          <div class="col-lg-12">
              <h1>Reporte de Compras</h1>
          </div>
      </div>
      <div class="row">
        <?= Highcharts::widget([
             'options' => [
                'chart' => [
                   'type' => 'column'
                 ],
                 'scripts' => [
                     'highcharts-more',
                     'modules/exporting',
                     'themes/grid'
                ],
                 'title' => [
                     'text' => 'Compras del Año 2016'
                 ],
                 'subtitle' => [
                     'text' => 'Estadisticas: cachamas.luiscordero29.com'
                 ],
                 'xAxis' => [
                     'categories' => [
                         'Ene',
                         'Feb',
                         'Mar',
                         'Abr',
                         'May',
                         'Jun',
                         'Jul',
                         'Ago',
                         'Sep',
                         'Oct',
                         'Nov',
                         'Dic'
                     ],
                     'crosshair' => true
                 ],
                 'yAxis' => [
                     'min' => 0,
                     'title' => [
                         'text' => 'Compras (Bs)'
                     ]
                 ],
                 'tooltip' => [
                     'headerFormat' => '<span style="font-size:10px">{point.key}</span><table>',
                     'pointFormat' => '<tr><td style="color:{series.color};padding:1">{series.name}: </td><td style="padding:1"><b>{point.y:.2f} Bs</b></td></tr>',
                     'footerFormat' => '</table>',
                     'shared' => true,
                     'useHTML' => true,
                 ],
                 'plotOptions' => [
                     'column' => [
                         'pointPadding' => 0.2,
                         'borderWidth' => 0
                     ]
                 ],
                'series' => [
                    ['name' => 'Especies', 'data' => $vectorEspecies],
                    ['name' => 'Equipos', 'data' => $vectorEquipos],
                    ['name' => 'Alimentos', 'data' => $vectorAlimentos],
                ]
             ]
          ]);

          HighchartsAsset::register($this)->withScripts(['highstock', 'modules/exporting', 'modules/drilldown']);
        ?>
      </div>
    </div>
</div>
