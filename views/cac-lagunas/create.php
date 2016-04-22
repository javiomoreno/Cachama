<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CacLagunas */

$this->title = 'Nueva Laguna';
$titulo = 'Nueva Laguna';
?>
<div class="cac-lagunas-create">

    <?= $this->render('_form', [
        'model' => $model, 'titulo' => $titulo,
    ]) ?>

</div>
