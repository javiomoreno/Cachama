<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CacLagunasEspecies */

$this->title = 'Nueva Laguna en Producción';
$titulo = 'Nueva Laguna en Producción';
?>
<div class="cac-lagunas-especies-create">

    <?= $this->render('_form', [
        'model' => $model, 'titulo' => $titulo,
    ]) ?>

</div>
