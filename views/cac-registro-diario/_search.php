<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\CacRegistroDiarioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cac-registro-diario-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'rediiden') ?>

    <?= $form->field($model, 'cac_lagunas_laguiden') ?>

    <?= $form->field($model, 'cac_alimentos_alimiden') ?>

    <?= $form->field($model, 'redifech') ?>

    <?= $form->field($model, 'redicamu') ?>

    <?php // echo $form->field($model, 'redicaal') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
