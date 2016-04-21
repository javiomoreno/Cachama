<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CacLagunas */

$this->title = 'Update Cac Lagunas: ' . $model->laguiden;
$this->params['breadcrumbs'][] = ['label' => 'Cac Lagunas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->laguiden, 'url' => ['view', 'id' => $model->laguiden]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cac-lagunas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
