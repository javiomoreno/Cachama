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
                    if ($this->params['pestanaEmpleado'] == 1) {
                      echo "<li class='active'>";
                      echo Html::a(Html::tag('i', '', ['class' => 'fa fa-home fa-fw']).' Inicio', ['/empleado/index'], ['class'=>'active'] );
                    }
                    else{
                      echo "<li>";
                      echo Html::a(Html::tag('i', '', ['class' => 'fa fa-home fa-fw']).' Inicio', ['/empleado/index'], '' );
                    }
                  ?>
                </li>
                  <?php
                    if ($this->params['pestanaEmpleado'] > 1 && $this->params['pestanaEmpleado'] <= 9) {
                      echo "<li class='active'>";
                      echo Html::a(Html::tag('i', '', ['class' => 'fa fa-sitemap fa-fw']).' Produción' . Html::tag('span', '', ['class'=>'fa arrow']), '', ['class'=>'active'] );
                      echo "<ul class='nav nav-second-level'>";
                    }
                    else{
                      echo "<li>";
                      echo Html::a(Html::tag('i', '', ['class' => 'fa fa-sitemap fa-fw']).' Produción' . Html::tag('span', '', ['class'=>'fa arrow']), '', ['']);
                      echo "<ul class='nav nav-second-level collapse'>";
                    }
                  ?>
                      <?php
                        if ($this->params['pestanaEmpleado'] == 2 || $this->params['pestanaEmpleado'] == 3 || $this->params['pestanaEmpleado'] == 4) {
                          echo "<li class='active'>";
                        }
                        else{
                          echo "<li>";
                        }
                      ?>
                          <a href="#">Lagunas <span class="fa arrow"></span></a>
                          <ul class="nav nav-third-level">
                              <?php
                                if ($this->params['pestanaEmpleado'] == 2) {
                                  echo "<li class='active'>";
                                  echo Html::a('Activar / Desactivar Lagunas', ['/cac-lagunas/lista-estados'], ['class'=>'active'] );
                                }
                                else{
                                  echo "<li>";
                                  echo Html::a('Activar / Desactivar Lagunas', ['/cac-lagunas/lista-estados'], ['class'=>''] );
                                }
                              ?>
                              </li>
                            </li>
                            <li>
                              <?php
                                if ($this->params['pestanaEmpleado'] == 3) {
                                  echo Html::a('Lagunas en Producción', ['/cac-lagunas-especies/index'], ['class'=>'active'] );
                                }
                                else{
                                  echo Html::a('Lagunas en Producción', ['/cac-lagunas-especies/index'], ['class'=>''] );
                                }
                              ?>
                            </li>
                            <li>
                              <?php
                                if ($this->params['pestanaEmpleado'] == 4) {
                                  echo Html::a('Nueva Laguna en Producción', ['/cac-lagunas-especies/create'], ['class'=>'active'] );
                                }
                                else{
                                  echo Html::a('Nueva Laguna en Producción', ['/cac-lagunas-especies/create'], ['class'=>''] );
                                }
                              ?>
                            </li>
                          </ul>
                          <!-- /.nav-third-level -->
                      </li>
                      <?php
                        if ($this->params['pestanaEmpleado'] == 5 || $this->params['pestanaEmpleado'] == 6) {
                          echo "<li class='active'>";
                        }
                        else{
                          echo "<li>";
                        }
                      ?>
                          <a href="#">Registros Diarios <span class="fa arrow"></span></a>
                          <ul class="nav nav-third-level">
                              <?php
                                if ($this->params['pestanaEmpleado'] == 5) {
                                  echo "<li class='active'>";
                                  echo Html::a('Listar Registros', ['/cac-registro-diario/index'], ['class'=>'active'] );
                                }
                                else{
                                  echo "<li>";
                                  echo Html::a('Listar Registros', ['/cac-registro-diario/index'], ['class'=>''] );
                                }
                              ?>
                              </li>
                              <?php
                                if ($this->params['pestanaEmpleado'] == 6) {
                                  echo "<li class='active'>";
                                  echo Html::a('Nuevo Registro', ['/cac-registro-diario/create'], ['class'=>'active'] );
                                }
                                else{
                                  echo "<li>";
                                  echo Html::a('Nuevo Registro', ['/cac-registro-diario/create'], ['class'=>''] );
                                }
                              ?>
                              </li>
                            </li>
                          </ul>
                          <!-- /.nav-third-level -->
                      </li>
                  </ul>
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
