<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CacRegistroDiario */

$this->title = 'Update Cac Registro Diario: ' . $model->rediiden;
$this->params['breadcrumbs'][] = ['label' => 'Cac Registro Diarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->rediiden, 'url' => ['view', 'id' => $model->rediiden]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cac-registro-diario-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
