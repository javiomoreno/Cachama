<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CacRegistroDiario */

$this->title = 'Nuevo Registro Diario';
$titulo = 'Nuevo Registro Diario';
?>
<div class="cac-registro-diario-create">

    <?= $this->render('_form', [
        'model' => $model, 'titulo' => $titulo,
    ]) ?>

</div>
