<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CacLagunas */
/* @var $form yii\widgets\ActiveForm */
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
            <?= Html::a('Equipos', ['index'], '' ); ?>
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
              <p style="float:left; margin-top: 30px; color: #5CB85C; padding-left: 15px;">Datos del equipo</p>
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
        </div>
        <div class="row">
          <div class="col-md-6">
            <?= $form->field($model, 'equinomb')->textInput(['maxlength' => true])->label('Nombre del Equipo <span class="asterisco">*</span>'); ?>
          </div>
          <div class="col-md-6">
            <?= $form->field($model, 'equidesc')->textarea(array('rows'=>3,'cols'=>5))->label('Descripción'); ?>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <?= $form->field($model, 'equiimag')->fileInput()->label('Imágen'); ?>
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
