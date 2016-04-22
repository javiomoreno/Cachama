<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CacLagunas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cac-lagunas-form">
    <div class="row" style="margin-left: -30px; margin-right: -30px;">
      <div class="breadcrumbs">
        <ul class="breadcrumb">
          <li>
            <i class="ace-icon fa fa-edit green"></i>
            <a href="#">Registrar</a>
          </li>
          <li>
            <?= Html::a('Proveedores', ['index'], '' ); ?>
          </li>
          <li class="active"><?= $titulo;?></li>
        </ul><!-- /.breadcrumb -->
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
              <p style="float:left; margin-top: 30px; color: #5CB85C; padding-left: 15px;">Datos del proveedor</p>
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
            <?= $form->field($model, 'cac_tipoProveedores_tipriden')->dropDownList($model->listaTipoProveedores, ['prompt' => 'Seleccione Tipo' ])->label('Tipo de Proveedor <span class="asterisco">*</span>');?>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <?= $form->field($model, 'provnomb')->textInput(['maxlength' => true])->label('Nombre del Proveedor <span class="asterisco">*</span>'); ?>
          </div>
          <div class="col-md-6">
            <?= $form->field($model, 'provrif')->textInput(['maxlength' => true])->label('Rif del Proveedor <span class="asterisco">*</span>'); ?>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <?= $form->field($model, 'provdire')->textInput()->label('Dirección del Proveedor <span class="asterisco">*</span>'); ?>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <?= $form->field($model, 'provemai')->textInput()->label('Email del Proveedor <span class="asterisco">*</span>'); ?>
          </div>
          <div class="col-md-6">
            <?= $form->field($model, 'provtele')->textInput()->label('Teléfono del Proveedor <span class="asterisco">*</span>'); ?>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <?= $form->field($model, 'provimag')->fileInput()->label('Imágen'); ?>
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
