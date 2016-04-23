<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CacUsuarios */

$this->title = 'Nuevo Empleado';
$titulo = 'Nuevo Empleado';
?>
<div class="cac-empleados-create">

    <?= $this->render('_form', [
        'model' => $model, 'titulo' => $titulo,
    ]) ?>

</div>
