<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\CacUsuariosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cac Usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cac-usuarios-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Cac Usuarios', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'usuaiden',
            'cac_sexos_sexoiden',
            'cac_tiposUsuarios_tiusiden',
            'usuanomb',
            'usuaapel',
            // 'usuacedu',
            // 'usuatele',
            // 'usuadire',
            // 'usuauser',
            // 'usuapass',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
