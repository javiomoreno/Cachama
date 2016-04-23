<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CacUsuarios */

$this->title = 'Nuevo Cliente';
$titulo = 'Nuevo Cliente';
?>
<div class="cac-usuarios-create">

    <?= $this->render('_form', [
        'model' => $model, 'titulo' => $titulo,
    ]) ?>

</div>
