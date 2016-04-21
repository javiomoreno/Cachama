<?php

use yii\helpers\Html;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Administrador</h1>
        <p>
          Bienvenido
        </p>
        <?php echo Html::a(Html::tag('span', '', ['class' => 'glyphicon glyphicon-user', 'style'=>'padding-right: 10px;']).'Usuarios', ['/mid-usuarios/index'], ['class'=> 'btn btn-success'] );?>
        <?php echo Html::a(Html::tag('span', '', ['class' => 'glyphicon glyphicon-tag', 'style'=>'padding-right: 10px;']).'Categorias', ['/mid-categorias/index'], ['class'=> 'btn btn-success'] );?>
        <?php echo Html::a(Html::tag('span', '', ['class' => 'glyphicon glyphicon-tags', 'style'=>'padding-right: 10px;']).'Sub Categorias', ['/mid-categorias/index'], ['class'=> 'btn btn-success'] );?>
    </div>

    <div class="body-content">

    </div>
</div>
