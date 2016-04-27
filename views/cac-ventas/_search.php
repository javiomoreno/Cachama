<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\CacVentasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cac-ventas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ventiden') ?>

    <?= $form->field($model, 'cac_lagunas_especies_laesinde') ?>

    <?= $form->field($model, 'cac_usuarios_usuaiden_cl') ?>

    <?= $form->field($model, 'cac_usuarios_usuaiden_us') ?>

    <?= $form->field($model, 'ventfech') ?>

    <?php // echo $form->field($model, 'vanttota') ?>

    <?php // echo $form->field($model, 'usuamodi') ?>

    <?php // echo $form->field($model, 'fechmodi') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
