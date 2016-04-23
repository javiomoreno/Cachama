<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CacEquipos */

$this->title = 'Nuevo Equipo';
$titulo = 'Nuevo Equipo';
?>
<div class="cac-equipos-create">

    <?= $this->render('_form', [
        'model' => $model, 'model2' => $model2, 'titulo' => $titulo,
    ]) ?>

</div>
