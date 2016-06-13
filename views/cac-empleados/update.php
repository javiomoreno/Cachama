<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CacUsuarios */

$this->title = 'Editar Empleado: ' . $model->usuanomb;
$titulo = 'Editar Empleado';
?>
<div class="cac-clientes-update">

    <?= $this->render('_form', [
        'model' => $model, 'titulo' => $titulo,
    ]) ?>

</div>
