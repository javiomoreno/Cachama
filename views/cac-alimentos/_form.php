<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use app\models\CacUsuarios;

/* @var $this yii\web\View */
/* @var $model app\models\CacLagunas */
/* @var $form yii\widgets\ActiveForm */
$usuario =  CacUsuarios::findIdentity(\Yii::$app->user->getId());
?>

<div class="cac-equipos-form">
    <div class="row" style="margin-left: -30px; margin-right: -30px;">
      <div class="breadcrumbs">
        <ul class="breadcrumb">
          <li>
            <i class="ace-icon fa fa-th-list green"></i>
            <a href="#">Inventario</a>
          </li>
          <li>
            <?= Html::a('Alimentos', ['index'], '' ); ?>
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
              <p style="float:left; margin-top: 30px; color: #5CB85C; padding-left: 15px;">Datos del alimento</p>
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
      <div class="col-md-8" style="padding-top: 100px;">
        <div class="row">
          <div class="col-md-6">
            <?= $form->field($model, 'cac_proveedores_providen')->dropDownList($model->listaProveedores, ['prompt' => 'Seleccione Proveedor' ])->label('Proveedor <span class="asterisco">*</span>');?>
          </div>
          <div class="col-md-6">
            <?= $form->field($model, 'alimnomb')->textInput(['maxlength' => true])->label('Nombre del Alimento <span class="asterisco">*</span>'); ?>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <?= $form->field($model, 'alimdesc')->textarea(array('rows'=>3,'cols'=>5))->label('Descripción'); ?>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3">
            <?= $form->field($model, 'alimpeun')->textInput(['maxlength' => true, 'onblur'=>'calcula()'])->label('Peso Unitario <span class="asterisco">*</span>'); ?>
          </div>
          <div class="col-md-3">
            <?= $form->field($model2, 'compcant')->textInput(['maxlength' => true, 'onblur'=>'calcula()'])->label('Cantidad <span class="asterisco">*</span>'); ?>
          </div>
          <div class="col-md-3">
            <?= $form->field($model2, 'compfech')->label('Fecha de Compra <span class="asterisco">*</span>')->widget(DatePicker::className(), ['dateFormat' => 'yyyy-MM-dd', 'options' => ['class' => 'form-control'],]) ?>
          </div>
          <div class="col-md-3">
            <?= $form->field($model2, 'compprun')->textInput(['maxlength' => true, 'onblur'=>'calcula()'])->label('Precio Unitario <span class="asterisco">*</span>'); ?>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4" style="float: right;">
            <?= $form->field($model, 'alimpeto')->textInput(['maxlength' => true, 'readonly' => true])->label('Total Peso <span class="asterisco">*</span>'); ?>
          </div>
          <div class="col-md-4" style="float: right;">
            <?= $form->field($model2, 'comptota')->textInput(['maxlength' => true, 'readonly' => true])->label('Total Dinero <span class="asterisco">*</span>'); ?>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="input-group image-preview">
            <input type="text" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
            <span class="input-group-btn">
                <!-- image-preview-clear button -->
                <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                    <span class="glyphicon glyphicon-remove"></span> Cancelar
                </button>
                <!-- image-preview-input -->
                <div class="btn btn-default image-preview-input">
                    <span class="glyphicon glyphicon-folder-open"></span>
                    <span class="image-preview-input-title">Buscar</span>
                    <?= $form->field($model, 'alimimag')->fileInput(['accept'=>'image/*'])->label(false); ?>
                </div>
            </span>
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
    var cantidad = document.getElementById('caccompras-compcant').value;
    var precio = document.getElementById('caccompras-compprun').value;
    document.getElementById('caccompras-comptota').value = parseFloat(precio * cantidad);

    var peso = document.getElementById('cacalimentos-alimpeun').value;
    document.getElementById('cacalimentos-alimpeto').value = parseFloat(peso * cantidad);
}
</script>
