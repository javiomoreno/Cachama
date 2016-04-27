<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;
use yii\filters\AccessControl;
use app\models\MidUsuarios;

class EmpleadoController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'registro-diario'],
                'rules' => [
                    [
                        'actions' => ['index', 'registro-diario'],
                        'allow' => true,
                        'roles' => ['empleado'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        Yii::$app->view->params['pestanaEmpleado'] = 1;
        $this->layout ="empleadoLayout";
        return $this->render('index');
    }

    public function actionPerfil()
    {
        $this->layout ="usuarioLayout";
        $model = MidUsuarios::findOne(\Yii::$app->user->getId());
        return $this->render('perfil', ['model' => $model]);
    }

    public function actionEditarPerfil()
    {
        $this->layout ="usuarioLayout";
        $model = MidUsuarios::findOne(\Yii::$app->user->getId());
        $claveOld = $model->usuapass;
        if ($model->load(Yii::$app->request->post())) {
          if ($model->usuapass !== $claveOld) {
            $model->setPassword($model->usuapass);
          }
          if ($user = $model->save()) {
            return $this->render('perfil', ['model' => $model]);
          }
          return $this->render('editar-perfil', ['model' => $model]);
        }
        return $this->render('editar-perfil', ['model' => $model]);
    }

    public function actionRegistroDiario()
    {
        Yii::$app->view->params['pestanaEmpleado'] = 3;
        $this->layout ="empleadoLayout";
        return $this->render('registro-diario');
    }
}
