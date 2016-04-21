<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\CacLagunasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cac-lagunas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'laguiden') ?>

    <?= $form->field($model, 'cac_usuarios_usuaiden') ?>

    <?= $form->field($model, 'lagunomb') ?>

    <?= $form->field($model, 'lagutama') ?>

    <?= $form->field($model, 'lagucapa') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
