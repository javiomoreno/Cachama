<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\CacUsuarios;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\CacLagunas */
/* @var $form yii\widgets\ActiveForm */
$usuario =  CacUsuarios::findIdentity(\Yii::$app->user->getId());
echo "Alimento ".Yii::$app->session->hasFlash('noCantidadAlimento');
echo "Muertes ".Yii::$app->session->hasFlash('noCantidadMuertes');
?>

<div class="cac-registro-diario-form">
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
          <li class="active"><?= $titulo;?></li>
        </ul><!-- /.breadcrumb -->
        <div class="nombre-usuario">
          Bienvenido, <?= $usuario->usuanomb." ".$usuario->usuaapel;?>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="page-header">
          <div class="col-lg-12">
              <h1><?= $titulo;?></h1>
          </div>
          <!-- /.col-lg-12 -->
          <div class="row">
            <div class="col-md-6">
              <p style="float:left; margin-top: 30px; color: #5CB85C; padding-left: 15px;">Datos de la laguna</p>
            </div>
            <div class="col-md-6">
              <p style="float:right; font-style: italic;">  Los campos con <span class="asterisco">*</span> son obligatorios</p>
            </div>
          </div>
        </div>
    </div>
    <?php $form = ActiveForm::begin([
                  'method' => 'post',
                  'options' => [
                        'enctype' => 'multipart/form-data',
                    ]]); ?>

    <div class="row">
      <div class="col-md-8" style="border-right: 2px solid #e2e2e2; padding-top: 100px;">
        <div class="col-md-12" style="margin-top: -60px; text-align: center;">
          <?php if (Yii::$app->session->hasFlash('noCantidadAlimento')): ?>
              <div class="alert alert-danger">
                  La cantidad de Alimento exede lo disponible
              </div>
          <?php elseif (Yii::$app->session->hasFlash('noCantidadMuertes')): ?>
              <div class="alert alert-danger">
                  La cantidad de Muertes exede la Cantidad Disponible
              </div>
          <?php endif; ?>
        </div>
        <div class="row">
          <div class="col-md-6">
            <?= $form->field($model, 'cac_lagunas_laguiden')->dropDownList($model->listaLagunas, ['prompt' => 'Seleccione Laguna', 'onchange'=>'cargarLaguna(this.value)' ])->label('Laguna <span class="asterisco">*</span>');?>
          </div>
          <div class="col-md-6">
            <?= $form->field($model, 'cac_alimentos_alimiden')->dropDownList($model->listaAlimentos, ['prompt' => 'Seleccione Alimento' , 'onchange'=>'cargarAlimento(this.value)'])->label('Alimento <span class="asterisco">*</span>');?>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <?= $form->field($model, 'redifech')->label('Fecha de Registro <span class="asterisco">*</span>')->widget(DatePicker::className(), ['dateFormat' => 'yyyy-MM-dd', 'options' => ['class' => 'form-control'],]) ?>
          </div>
          <div class="col-md-4">
            <?= $form->field($model, 'redicamu')->textInput(['maxlength' => true])->label('Cantidad de Muertes <span class="asterisco">*</span>'); ?>
          </div>
          <div class="col-md-4">
            <?= $form->field($model, 'redicaal')->textInput()->label('Cantidad de Alimento <span class="asterisco">*</span>'); ?>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <!--<div class="imagen">
          <img id="imagenLaguna" src="" height="100%" width="100%" />
        </div>-->
        <div class="laguna">
          <h3>Laguna</h3>
          <div class="row">
            <div class="col-lg-12">
              <h4>Nombre de Laguna: <span id="tituloLaguna"></span></h4>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <h4>Cantidad: <span id="tituloCantidadLag"></span></h4>
            </div>
          </div>
        </div>
        <div class="alimento" style="border-top: 2px solid #e2e2e2;">
          <h3>Alimento</h3>
          <div class="row">
            <div class="col-lg-12">
              <h4>Nombre de Alimento: <span id="tituloAlimento"></span></h4>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <h4>Cantidad Disponible: <span id="tituloCantidadAli"></span></h4>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div style="padding-top: 50px;">
      <div class="row">
        <div class="col-md-6">
          <?= Html::a('Cancelar', ['/empleado/index'], ['class'=>'btn btn-default']) ?>
        </div>
        <div class="col-md-6" style="float:right">
          <?= Html::submitButton($model->isNewRecord ? 'Agregar' : 'Editar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-success', 'style'=>'float:right']) ?>
        </div>
      </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
<footer class="footer">
  <p class="pull-left">&copy; Cachamas <?= date('Y') ?></p>
  <p class="pull-right"><?= Yii::powered() ?></p>
</footer>

<script type="text/javascript">
  function cargarLaguna(id){
    if(id){
      $.ajax({
        url: '../cac-lagunas/laguna-produccion',
        type: 'GET',
        data: 'id='+id,
        dataType: 'json',
        "success":function(data){
          document.getElementsByClassName('laguna')[0].style.display = 'block';
          document.getElementById("tituloLaguna").innerHTML = data.lagunomb;
          document.getElementById("tituloCantidadLag").innerHTML = data.lagucant;
        }
      });
    }else {
      document.getElementsByClassName('laguna')[0].style.display = 'none';
    }
  }

  function cargarAlimento(id){
    if(id){
      $.ajax({
        url: '../cac-alimentos/alimento',
        type: 'GET',
        data: 'id='+id,
        dataType: 'json',
        "success":function(data){
          document.getElementsByClassName('alimento')[0].style.display = 'block';
          document.getElementById("tituloAlimento").innerHTML = data.alimnomb;
          document.getElementById("tituloCantidadAli").innerHTML = data.alimcant;
        }
      });
    }else {
      document.getElementsByClassName('alimento')[0].style.display = 'none';
    }
  }
</script>
