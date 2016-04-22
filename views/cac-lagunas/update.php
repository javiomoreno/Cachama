<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CacLagunas */

$this->title = 'Editar Laguna: ' . $model->lagunomb;
$titulo = 'Editar Laguna';
?>
<div class="cac-lagunas-update">

    <?= $this->render('_form', [
        'model' => $model, 'titulo' => $titulo, 'dynamic' => $dynamic,
    ]) ?>

</div>
