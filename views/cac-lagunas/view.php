<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CacLagunas */

$this->title = $model->laguiden;
$this->params['breadcrumbs'][] = ['label' => 'Cac Lagunas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cac-lagunas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->laguiden], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->laguiden], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'laguiden',
            'lagunomb',
            'lagutama',
            'lagucapa',
        ],
    ]) ?>

    <img src="data:image/jpeg;base64,<?= base64_encode($model->laguimag) ?>" height="100%" width="100%" />

</div>
