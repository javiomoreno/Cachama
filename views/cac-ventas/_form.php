<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\CacUsuarios;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\CacLagunas */
/* @var $form yii\widgets\ActiveForm */
$usuario =  CacUsuarios::findIdentity(\Yii::$app->user->getId());
?>

<div class="cac-ventas-form">
    <div class="row" style="margin-left: -30px; margin-right: -30px;">
      <div class="breadcrumbs">
        <ul class="breadcrumb">
          <li>
            <i class="ace-icon fa fa-dollar green"></i>
            <a href="#">Ventas</a>
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
              <p style="float:left; margin-top: 30px; color: #5CB85C; padding-left: 15px;">Datos de la Venta</p>
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
        <div class="row">
          <div class="col-md-6">
            <?= $form->field($model, 'cac_usuarios_usuaiden_cl')->dropDownList($model->listaClientes, ['prompt' => 'Seleccione Cliente' , 'onchange'=>'cargarCliente(this.value)'])->label('Cliente <span class="asterisco">*</span>');?>
          </div>
          <div class="col-md-6">
            <?= $form->field($model, 'cac_lagunas_especies_laesiden')->dropDownList($model->listaLagunasProduccion, ['prompt' => 'Seleccione Laguna' , 'onchange'=>'cargarLagunaProduccion(this.value)'])->label('Laguna <span class="asterisco">*</span>');?>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <?= $form->field($model, 'ventcaes')->textInput(['maxlength' => true, 'onblur'=>'calcula()'])->label('Cantidad de Cachamas <span class="asterisco">*</span>'); ?>
          </div>
          <div class="col-md-4">
            <?= $form->field($model, 'ventfech')->label('Fecha de Venta <span class="asterisco">*</span>')->widget(DatePicker::className(), ['dateFormat' => 'yyyy-MM-dd', 'options' => ['class' => 'form-control'],]) ?>
          </div>
          <div class="col-md-4">
            <?= $form->field($model, 'ventpres')->textInput(['maxlength' => true, 'onblur'=>'calcula()'])->label('Precio de Unidad <span class="asterisco">*</span>'); ?>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4" style="float: right;">
            <?= $form->field($model, 'venttota')->textInput(['maxlength' => true, 'readonly' => true])->label('Total de Venta <span class="asterisco">*</span>'); ?>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <!--<div class="imagen">
          <img id="imagenLaguna" src="" height="100%" width="100%" />
        </div>-->
        <div class="alimento">
          <h3>Cliente</h3>
          <div class="row">
            <div class="col-lg-12">
              <h4>Nombre de Cliente: <span id="tituloNombreCliente"></span></h4>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <h4>Telefono de Cliente: <span id="tituloTelefonoCliente"></span></h4>
            </div>
          </div>
        </div>
        <div class="laguna" style="border-top: 2px solid #e2e2e2;">
          <h3>Laguna</h3>
          <div class="row">
            <div class="col-lg-12">
              <h4>Nombre de Laguna: <span id="tituloLaguna"></span></h4>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <h4>Disponibilidad: <span id="tituloCantidadLag"></span></h4>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div style="padding-top: 50px;">
      <div class="row">
        <div class="col-md-6">
          <?= Html::a('Cancelar', ['/administrador/index'], ['class'=>'btn btn-default']) ?>
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
  function calcula() {
      var cantidad = document.getElementById('cacventas-ventcaes').value;
      var precio = document.getElementById('cacventas-ventpres').value;
      document.getElementById('cacventas-venttota').value = parseFloat(precio * cantidad);
  }

  function cargarLagunaProduccion(id){
    if(id){
      $.ajax({
        url: '../cac-lagunas-especies/laguna-especie',
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

  function cargarCliente(id){
    if(id){
      $.ajax({
        url: '../cac-usuarios/cliente',
        type: 'GET',
        data: 'id='+id,
        dataType: 'json',
        "success":function(data){
          document.getElementsByClassName('alimento')[0].style.display = 'block';
          document.getElementById("tituloNombreCliente").innerHTML = data.clienomb;
          document.getElementById("tituloTelefonoCliente").innerHTML = data.clietele;
        }
      });
    }else {
      document.getElementsByClassName('alimento')[0].style.display = 'none';
    }
  }
</script>
