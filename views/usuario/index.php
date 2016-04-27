<?php

use yii\helpers\Html;
use app\models\CacUsuarios;

$this->title = 'Cachamas';
$usuario =  CacUsuarios::findIdentity(\Yii::$app->user->getId());
?>
<div class="usuario-index">
  <div class="row" style="margin-left: -30px; margin-right: -30px;">
    <div class="breadcrumbs">
      <ul class="breadcrumb">
        <li>
          <i class="ace-icon fa fa-home green"></i>
          Inicio
        </li>
      </ul><!-- /.breadcrumb -->
      <div class="nombre-usuario">
        Bienvenido, <?= $usuario->usuanomb." ".$usuario->usuaapel;?>
      </div>
    </div>
  </div>
    <div class="jumbotron">
        <h1>Usuario</h1>
        <p>
          Bienvenido
        </p>
        <div class="row">
          <div class="col-lg-1">
          </div>
          <div class="col-lg-2 col-md-6">
              <div class="panel panel-green">
                  <div class="panel-heading">
                      <div class="row">
                          <div class="col-xs-3">
                              <i class="fa fa-th-list fa-3x"></i>
                          </div>
                          <div class="col-xs-9 text-right">
                              <div class="titulo-categoria">Inventario</div>
                          </div>
                      </div>
                  </div>
                  <div class="panel-footer">
                  </div>
              </div>
          </div>
          <div class="col-lg-2 col-md-6">
              <div class="panel panel-green">
                  <div class="panel-heading">
                      <div class="row">
                          <div class="col-xs-3">
                              <i class="fa fa-edit fa-3x"></i>
                          </div>
                          <div class="col-xs-9 text-right">
                              <div class="titulo-categoria">Registrar</div>
                          </div>
                      </div>
                  </div>
                  <div class="panel-footer">
                  </div>
              </div>
          </div>
          <div class="col-lg-2 col-md-6">
              <div class="panel panel-green">
                  <div class="panel-heading">
                      <div class="row">
                          <div class="col-xs-3">
                              <i class="fa fa-sitemap fa-3x"></i>
                          </div>
                          <div class="col-xs-9 text-right">
                              <div class="titulo-categoria">Producción</div>
                          </div>
                      </div>
                  </div>
                  <div class="panel-footer">
                  </div>
              </div>
          </div>
          <div class="col-lg-2 col-md-6">
              <div class="panel panel-green">
                  <div class="panel-heading">
                      <div class="row">
                          <div class="col-xs-3">
                              <i class="fa fa-file-o fa-3x"></i>
                          </div>
                          <div class="col-xs-9 text-right">
                              <div class="titulo-categoria">Reportes</div>
                          </div>
                      </div>
                  </div>
                  <div class="panel-footer">
                  </div>
              </div>
          </div>
          <div class="col-lg-2 col-md-6">
              <div class="panel panel-green">
                  <div class="panel-heading">
                      <div class="row">
                          <div class="col-xs-3">
                              <i class="fa fa-dollar fa-3x"></i>
                          </div>
                          <div class="col-xs-9 text-right">
                              <div class="titulo-categoria">Ventas</div>
                          </div>
                      </div>
                  </div>
                  <div class="panel-footer">
                  </div>
              </div>
          </div>
          <div class="col-lg-1">
          </div>
        </div>
    </div>

    <div class="body-content">

    </div>
</div>
