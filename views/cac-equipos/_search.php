<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\CacEquiposSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cac-equipos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'equiiden') ?>

    <?= $form->field($model, 'cac_proveedores_providen') ?>

    <?= $form->field($model, 'equinomb') ?>

    <?= $form->field($model, 'equidesc') ?>

    <?= $form->field($model, 'equiimag') ?>

    <?php // echo $form->field($model, 'usuamodi') ?>

    <?php // echo $form->field($model, 'fechmodi') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
