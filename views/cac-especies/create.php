<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CacEspecies */

$this->title = 'Nueva Especie';
$titulo = 'Nueva Especie';
?>
<div class="cac-especies-create">

    <?= $this->render('_form', [
        'model' => $model, 'titulo' => $titulo, 'model2' => $model2,
    ]) ?>

</div>
