<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CacUsuarios */

$this->title = 'Editar Usuario: ' . $model->usuanomb;
$titulo = 'Editar Usuario';
?>
<div class="cac-usuarios-update">

    <?= $this->render('_form', [
      'model' => $model, 'titulo' => $titulo,
    ]) ?>

</div>
