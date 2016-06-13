<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CacEquipos */

$this->title = 'Editar Equipo: ' . $model->equinomb;
$titulo = 'Editar Equipo';
?>
<div class="cac-equipos-update">

    <?= $this->render('_form', [
        'model' => $model, 'titulo' => $titulo,
    ]) ?>

</div>
