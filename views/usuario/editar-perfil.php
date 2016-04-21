<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MidUsuarios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mid-usuarios-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
      <div class="col-lg-6">
        <?= $form->field($model, 'usuanomb')->textInput(['maxlength' => true]) ?>
      </div>
      <div class="col-lg-6">
        <?= $form->field($model, 'usuaapel')->textInput(['maxlength' => true]) ?>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-6">
        <?= $form->field($model, 'usuacedu')->textInput(['maxlength' => true]) ?>
      </div>
      <div class="col-lg-6">
        <?= $form->field($model, 'usuatele')->textInput(['maxlength' => true]) ?>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <?= $form->field($model, 'usuadire')->textInput(['maxlength' => true]) ?>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-4">
        <?= $form->field($model, 'usuaemai')->textInput(['maxlength' => true]) ?>
      </div>
      <div class="col-lg-4">
        <?= $form->field($model, 'usuauser')->textInput(['maxlength' => true]) ?>
      </div>
      <div class="col-lg-4">
        <?= $form->field($model, 'usuapass')->passwordInput(['maxlength' => true]) ?>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-6">
        <?= $form->field($model, 'mid_sexos_sexoiden')->dropDownList($model->listaSexos, ['prompt' => 'Seleccione Sexo' ]);?>
      </div>
      <div class="col-lg-6">
        <?= $form->field($model, 'mid_tiposUsuarios_tiusiden')->dropDownList($model->listaTipoUsuarios, ['prompt' => 'Seleccione Tipo' ]);?>
      </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear Usuario' : 'Modificar Usuario', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
