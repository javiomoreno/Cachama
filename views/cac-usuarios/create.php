<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CacUsuarios */

$this->title = 'Create Cac Usuarios';
$this->params['breadcrumbs'][] = ['label' => 'Cac Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cac-usuarios-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
