<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CacAlimentos */

$this->title = 'Editar Alimento: ' . $model->alimnomb;
$titulo = 'Editar Alimento';
?>
<div class="cac-alimentos-update">

    <?= $this->render('_form', [
        'model' => $model, 'model2' => $model2, 'titulo' => $titulo,
    ]) ?>

</div>
