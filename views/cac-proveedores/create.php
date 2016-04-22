<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CacProveedores */

$this->title = 'Nuevo Proveedor';
$titulo = 'Nuevo Proveedor';
?>
<div class="cac-proveedores-create">

    <?= $this->render('_form', [
        'model' => $model, 'titulo' => $titulo,
    ]) ?>

</div>
