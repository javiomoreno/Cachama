<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CacProveedores */

$this->title = 'Editar Proveedor: ' . $model->provnomb;
$titulo = 'Editar Proveedor';
?>
<div class="cac-proveedores-update">

    <?= $this->render('_form', [
      'model' => $model, 'titulo' => $titulo,
    ]) ?>

</div>
