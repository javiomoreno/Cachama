<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CacUsuarios */

$this->title = 'Update Cac Usuarios: ' . $model->usuaiden;
$this->params['breadcrumbs'][] = ['label' => 'Cac Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->usuaiden, 'url' => ['view', 'id' => $model->usuaiden]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cac-usuarios-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
