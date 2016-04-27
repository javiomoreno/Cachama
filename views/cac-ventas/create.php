<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CacVentas */

$this->title = 'Nueva Venta';
$titulo = 'Nueva Venta'
?>
<div class="cac-ventas-create">

    <?= $this->render('_form', [
        'model' => $model, 'titulo' => $titulo,
    ]) ?>

</div>
