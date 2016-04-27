<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CacLagunasEspecies */

$this->title = 'Update Cac Lagunas Especies: ' . $model->laesinde;
$this->params['breadcrumbs'][] = ['label' => 'Cac Lagunas Especies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->laesinde, 'url' => ['view', 'id' => $model->laesinde]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cac-lagunas-especies-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
