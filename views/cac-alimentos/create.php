<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CacAlimentos */

$this->title = 'Nuevo Alimento';
$titulo = 'Nuevo Alimento';
?>
<div class="cac-alimentos-create">

    <?= $this->render('_form', [
        'model' => $model, 'titulo' => $titulo, 'model2' => $model2,
    ]) ?>

</div>
