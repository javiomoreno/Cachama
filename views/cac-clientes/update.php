<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CacUsuarios */

$this->title = 'Editar Cliente: ' . $model->usuanomb;
$titulo = 'Editar Cliente';
?>
<div class="cac-clientes-update">

    <?= $this->render('_form', [
        'model' => $model, 'titulo' => $titulo,
    ]) ?>

</div>
