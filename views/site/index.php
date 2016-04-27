<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
/* @var $this yii\web\View */

$this->title = 'Cachamas';
$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-user form-control-feedback'></span>"
];
$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];
?>
<div class="container-login">
    <div class="row">
        <div class="col-xs-12- col-sm-12 col-md-12 col-lg-12">
            <div class="card card-container">
                <div class='info' style='text-align:center;'>
                    <?php
                        $flashMessages = Yii::$app->session->getFlash('error');
                        if($flashMessages)
                        {
                            echo '<div id="alert-message" class="alert alert-danger" role="alert">' . $flashMessages. "</div>";
                        }
                    ?>
                </div>
                <?php $form = ActiveForm::begin([
                    'id' => 'login-form',
                    'options' => ['class' => 'form-horizontal'],
                    'fieldConfig' => [
                        'template' => "<div class=\"col-lg-12\">{input}</div>\n<div class=\"col-lg-12\">{error}</div>",
                        'labelOptions' => ['class' => 'col-lg-1 control-label'],
                    ],
                ]); ?>

                <img id="profile-img" class="profile-img-card" src="imagenes/avatar.png" />
                <p id="profile-name" class="profile-name-card"></p>
                <span id="reauth-email" class="reauth-email"></span>

                <?= $form
                    ->field($model, 'username', $fieldOptions1)
                    ->label(false)
                    ->textInput(['placeholder' => 'Usuario']) ?>

                <?= $form
                        ->field($model, 'password', $fieldOptions2)
                        ->label(false)
                        ->passwordInput(['placeholder' => 'Contraseña']) ?>

                <div class="form-group">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <?= Html::submitButton('Iniciar Sesión', ['class' => 'btn btn-primary btn-block btn-sm', 'name' => 'login-button']) ?>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <?= Html::a('Recuperar Datos', ['/site/recuperar-datos'], ['class' => 'btn btn-success btn-block btn-sm']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
