<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CacEspecies */

$this->title = 'Editar Especie: ' . $model->espenomb;
$titulo = 'Editar Especie';
?>
<div class="cac-especies-update">

    <?= $this->render('_form', [
        'model' => $model, 'titulo' => $titulo,
    ]) ?>

</div>
