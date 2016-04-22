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
            <i class="ace-icon fa fa-th-list green"></i>
            <a href="#">Inventario</a>
          </li>
          <li>
            <?= Html::a('Lagunas', ['index'], '' ); ?>
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
      <div class="col-md-8" style="padding-top: 100px;">
        <div class="row">
          <div class="col-md-6">
            <?= $form->field($model, 'lagunomb')->textInput(['maxlength' => true])->label('Nombre de la Laguna <span class="asterisco">*</span>'); ?>
          </div>
          <div class="col-md-6">
            <?= $form->field($model, 'lagutama')->textInput(['maxlength' => true])->label('Tamaño de la Laguna <span class="asterisco">*</span>'); ?>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <?= $form->field($model, 'lagucapa')->textInput()->label('Capacidad de la Laguna <span class="asterisco">*</span>'); ?>
          </div>
          <div class="col-md-6">
            <?= $form->field($model, 'lagudesc')->textarea(array('rows'=>3,'cols'=>5))->label('Descripción'); ?>
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
                    <?= $form->field($model, 'laguimag')->fileInput(['accept'=>'image/*'])->label(false); ?>
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
