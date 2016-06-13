<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\CacProveedoresSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cac-proveedores-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'providen') ?>

    <?= $form->field($model, 'cac_tipoProveedores_tipriden') ?>

    <?= $form->field($model, 'provnomb') ?>

    <?= $form->field($model, 'provrif') ?>

    <?= $form->field($model, 'provdire') ?>

    <?php // echo $form->field($model, 'provtele') ?>

    <?php // echo $form->field($model, 'provemai') ?>

    <?php // echo $form->field($model, 'provimag') ?>

    <?php // echo $form->field($model, 'usuamodi') ?>

    <?php // echo $form->field($model, 'fechmodi') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
