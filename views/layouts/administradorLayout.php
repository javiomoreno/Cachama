<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <script src="../sb-admin/bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="../fileInput/script.js"></script>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div id="wrapper">

  <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html" style="color: #F8F8F8;"><i class="fa fa-leaf"></i> Cachamas</a>
    </div>
    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="background-color: #F8F8F8;">
                <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="#"><i class="fa fa-user fa-fw"></i> Perfil</a>
                </li>
                <li><a href="#"><i class="fa fa-gear fa-fw"></i> Configuración</a>
                </li>
                <li class="divider"></li>
                <li>
                  <?= Html::a(Html::tag('i', '', ['class' => 'fa fa-sign-out fa-fw']).'Salir', ['/site/logout'], ['data-method' => 'post'] );?>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <span style="text-align: -webkit-center; color: #777777;">
                        <h3>Menú</h3>
                    </span>
                </li>
                  <?php
                    if ($this->params['pestanaAdministrador'] == 1) {
                      echo "<li class='active'>";
                      echo Html::a(Html::tag('i', '', ['class' => 'fa fa-home fa-fw']).' Inicio', ['/administrador/index'], ['class'=>'active'] );
                    }
                    else{
                      echo "<li>";
                      echo Html::a(Html::tag('i', '', ['class' => 'fa fa-home fa-fw']).' Inicio', ['/administrador/index'], '' );
                    }
                  ?>
                </li>
                  <?php
                    if ($this->params['pestanaAdministrador'] > 1 && $this->params['pestanaAdministrador'] <= 9) {
                      echo "<li class='active'>";
                      echo Html::a(Html::tag('i', '', ['class' => 'fa fa-th-list fa-fw']).' Inventario' . Html::tag('span', '', ['class'=>'fa arrow']), '', ['class'=>'active'] );
                      echo "<ul class='nav nav-second-level'>";
                    }
                    else{
                      echo "<li>";
                      echo Html::a(Html::tag('i', '', ['class' => 'fa fa-th-list fa-fw']).' Inventario' . Html::tag('span', '', ['class'=>'fa arrow']), '', ['class'=>'']);
                      echo "<ul class='nav nav-second-level collapse'>";
                    }
                  ?>
                        <li>
                            <a href="#">Lagunas <span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                              <li>
                                <?php
                                  if ($this->params['pestanaAdministrador'] == 2) {
                                    echo Html::a('Listar Lagunas', ['/cac-lagunas/index'], ['class'=>'active'] );
                                  }
                                  else{
                                    echo Html::a('Listar Lagunas', ['/cac-lagunas/index'], ['class'=>''] );
                                  }
                                ?>
                              </li>
                              <li>
                                <?php
                                  if ($this->params['pestanaAdministrador'] == 3) {
                                    echo Html::a('Nueva Laguna', ['/cac-lagunas/create'], ['class'=>'active'] );
                                  }
                                  else{
                                    echo Html::a('Nueva Laguna', ['/cac-lagunas/create'], ['class'=>''] );
                                  }
                                ?>
                              </li>
                            </ul>
                            <!-- /.nav-third-level -->
                        </li>
                        <li>
                            <a href="#">Equipos <span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li>
                                  <?php
                                    if ($this->params['pestanaAdministrador'] == 4) {
                                      echo Html::a('Listar Equipos', ['/cac-equipos/index'], ['class'=>'active'] );
                                    }
                                    else{
                                      echo Html::a('Listar Equipos', ['/cac-equipos/index'], ['class'=>''] );
                                    }
                                  ?>
                                </li>
                                <li>
                                  <?php
                                    if ($this->params['pestanaAdministrador'] == 5) {
                                      echo Html::a('Nueva Equipo', ['/cac-equipos/create'], ['class'=>'active'] );
                                    }
                                    else{
                                      echo Html::a('Nueva Equipo', ['/cac-equipos/create'], ['class'=>''] );
                                    }
                                  ?>
                                </li>
                            </ul>
                            <!-- /.nav-third-level -->
                        </li>
                        <li>
                            <a href="#">Alimentos <span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                              <li>
                                <?php
                                  if ($this->params['pestanaAdministrador'] == 6) {
                                    echo Html::a('Listar Alimentos', ['/cac-alimentos/index'], ['class'=>'active'] );
                                  }
                                  else{
                                    echo Html::a('Listar Alimentos', ['/cac-alimentos/index'], ['class'=>''] );
                                  }
                                ?>
                              </li>
                              <li>
                                <?php
                                  if ($this->params['pestanaAdministrador'] == 7) {
                                    echo Html::a('Nueva Alimento', ['/cac-alimentos/create'], ['class'=>'active'] );
                                  }
                                  else{
                                    echo Html::a('Nueva Alimento', ['/cac-alimentos/create'], ['class'=>''] );
                                  }
                                ?>
                              </li>
                            </ul>
                            <!-- /.nav-third-level -->
                        </li>
                        <li>
                            <a href="#">Especies <span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li>
                                  <?php
                                    if ($this->params['pestanaAdministrador'] == 8) {
                                      echo Html::a('Listar Especies', ['/cac-especies/index'], ['class'=>'active'] );
                                    }
                                    else{
                                      echo Html::a('Listar Especies', ['/cac-especies/index'], ['class'=>''] );
                                    }
                                  ?>
                                </li>
                                <li>
                                  <?php
                                    if ($this->params['pestanaAdministrador'] == 9) {
                                      echo Html::a('Nueva Especie', ['/cac-especies/create'], ['class'=>'active'] );
                                    }
                                    else{
                                      echo Html::a('Nueva Especie', ['/cac-especies/create'], ['class'=>''] );
                                    }
                                  ?>
                                </li>
                            </ul>
                            <!-- /.nav-third-level -->
                        </li>
                      </ul>
                    </li>
                      <?php
                        if ($this->params['pestanaAdministrador'] > 9 && $this->params['pestanaAdministrador'] <= 17) {
                          echo "<li class='active'>";
                          echo Html::a(Html::tag('i', '', ['class' => 'fa fa-edit fa-fw']).' Registrar' . Html::tag('span', '', ['class'=>'fa arrow']), '', '' );
                          echo "<ul class='nav nav-second-level'>";
                        }
                        else{
                          echo "<li>";
                          echo Html::a(Html::tag('i', '', ['class' => 'fa fa-edit fa-fw']).' Registrar' . Html::tag('span', '', ['class'=>'fa arrow']), '', ['class'=>'']);
                          echo "<ul class='nav nav-second-level collapse'>";
                        }
                      ?>
                            <li>
                                <a href="#">Usuarios <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">Listar Usuarios</a>
                                    </li>
                                    <li>
                                        <a href="#">Nuevo Usuario</a>
                                    </li>
                                </ul>
                                <!-- /.nav-third-level -->
                            </li>
                            <li>
                                <a href="#">Clientes <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">Listar Clientes</a>
                                    </li>
                                    <li>
                                        <a href="#">Nuevo Cliente</a>
                                    </li>
                                </ul>
                                <!-- /.nav-third-level -->
                            </li>
                            <li>
                                <a href="#">Empleados <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">Listar Empleados</a>
                                    </li>
                                    <li>
                                        <a href="#">Nuevo Empleado</a>
                                    </li>
                                </ul>
                                <!-- /.nav-third-level -->
                            </li>
                            <li>
                                <a href="#">Proveedores <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                      <?php
                                        if ($this->params['pestanaAdministrador'] == 16) {
                                          echo Html::a('Listar Proveedores', ['/cac-proveedores/index'], ['class'=>'active'] );
                                        }
                                        else{
                                          echo Html::a('Listar Proveedores', ['/cac-proveedores/index'], ['class'=>''] );
                                        }
                                      ?>
                                    </li>
                                    <li>
                                      <?php
                                        if ($this->params['pestanaAdministrador'] == 17) {
                                          echo Html::a('Nuevo Proveedor', ['/cac-proveedores/create'], ['class'=>'active'] );
                                        }
                                        else{
                                          echo Html::a('Nuevo Proveedor', ['/cac-proveedores/create'], ['class'=>''] );
                                        }
                                      ?>
                                    </li>
                                </ul>
                                <!-- /.nav-third-level -->
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                      <?php
                        if ($this->params['pestanaAdministrador'] > 10 && $this->params['pestanaAdministrador'] <= 13) {
                          echo "<li class='active'>";
                          echo Html::a(Html::tag('i', '', ['class' => 'fa fa-dollar fa-fw']).' Ventas' . Html::tag('span', '', ['class'=>'fa arrow']), '', '' );
                          echo "<ul class='nav nav-second-level'>";
                        }
                        else{
                          echo "<li>";
                          echo Html::a(Html::tag('i', '', ['class' => 'fa fa-dollar fa-fw']).' Ventas' . Html::tag('span', '', ['class'=>'fa arrow']), '', ['class'=>'']);
                          echo "<ul class='nav nav-second-level collapse'>";
                        }
                      ?>
                            <li>
                                <a href="#">Especies <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">Listar Ventas</a>
                                    </li>
                                    <li>
                                        <a href="#">Nuevo Venta</a>
                                    </li>
                                </ul>
                                <!-- /.nav-third-level -->
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
  </nav>

    <div id="page-wrapper">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<!-- Bootstrap Core JavaScript -->


<!-- Bootstrap Core JavaScript -->
<script src="../sb-admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../sb-admin/bower_components/metisMenu/dist/metisMenu.min.js"></script>

<!-- DataTables JavaScript -->
<script src="../sb-admin/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="../sb-admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../sb-admin/dist/js/sb-admin-2.js"></script>

<?php $this->endPage() ?>
