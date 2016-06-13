<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\CacAlimentosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cac-alimentos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'alimiden') ?>

    <?= $form->field($model, 'cac_proveedores_providen') ?>

    <?= $form->field($model, 'alimnomb') ?>

    <?= $form->field($model, 'alimdesc') ?>

    <?= $form->field($model, 'alimimag') ?>

    <?php // echo $form->field($model, 'usuamodi') ?>

    <?php // echo $form->field($model, 'fechmodi') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
