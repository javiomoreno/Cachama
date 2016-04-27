<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CacVentas */

$this->title = 'Update Cac Ventas: ' . $model->ventiden;
$this->params['breadcrumbs'][] = ['label' => 'Cac Ventas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ventiden, 'url' => ['view', 'id' => $model->ventiden]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cac-ventas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
