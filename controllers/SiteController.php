<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\CacUsuarios;
use app\models\EmailForm;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
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
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            if(\Yii::$app->user->can('administrador')){
                /*if(ApsUsuarios::findOne(\Yii::$app->user->getId())->usuaesta == 1){
                    return Yii::$app->getResponse()->redirect(array('/aps-usuarios/registrar'));
                }*/
                return Yii::$app->getResponse()->redirect(array('/administrador/index'));
            }
            else if(\Yii::$app->user->can('usuario')){
                /*if(ApsUsuarios::findOne(\Yii::$app->user->getId())->usuaesta == 1){
                    return Yii::$app->getResponse()->redirect(array('/aps-usuarios/registrar'));
                }*/
                return Yii::$app->getResponse()->redirect(array('/usuario/index'));
            }
            else if(\Yii::$app->user->can('empleado')){
                /*if(ApsUsuarios::findOne(\Yii::$app->user->getId())->usuaesta == 1){
                    return Yii::$app->getResponse()->redirect(array('/aps-usuarios/registrar'));
                }*/
                return Yii::$app->getResponse()->redirect(array('/empleado/index'));
            }
            return $this->goBack();
        }
        return $this->render('index', [
            'model' => $model,
        ]);
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            if(\Yii::$app->user->can('administrador')){
                /*if(ApsUsuarios::findOne(\Yii::$app->user->getId())->usuaesta == 1){
                    return Yii::$app->getResponse()->redirect(array('/aps-usuarios/registrar'));
                }*/
                return Yii::$app->getResponse()->redirect(array('/administrador/index'));
            }
            else if(\Yii::$app->user->can('usuario')){
                /*if(ApsUsuarios::findOne(\Yii::$app->user->getId())->usuaesta == 1){
                    return Yii::$app->getResponse()->redirect(array('/aps-usuarios/registrar'));
                }*/
                return Yii::$app->getResponse()->redirect(array('/usuario/index'));
            }
            else if(\Yii::$app->user->can('empleado')){
                /*if(ApsUsuarios::findOne(\Yii::$app->user->getId())->usuaesta == 1){
                    return Yii::$app->getResponse()->redirect(array('/aps-usuarios/registrar'));
                }*/
                return Yii::$app->getResponse()->redirect(array('/empleado/index'));
            }
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionRegistrar()
    {
      $model = new MidUsuarios();

      if ($model->load(Yii::$app->request->post())) {
          $model->mid_tiposUsuarios_tiusiden = 2;
          $model->setPassword($model->usuapass);
          if ($user = $model->save()) {
              $auth = \Yii::$app->authManager;
              $role = $auth->getRole('usuario');
              $auth->assign($role, $model->getId());
              if (Yii::$app->getUser()->login($model)) {
                  return Yii::$app->getResponse()->redirect(array('/usuario/index'));
              }
          }
          return $this->render('registrar', [
              'model' => $model,
          ]);
      } else {
          return $this->render('registrar', [
              'model' => $model,
          ]);
      }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionRecuperarDatos()
    {
        $model = new EmailForm();

        if ($model->load(Yii::$app->request->post())) {
          if($model2 = MidUsuarios::findByEmail($model->email)){
              $emailAdmin = Yii::$app->params['adminEmail'];
              $asunto = "Recuperar Datos";
              $cuerpo = "Usuario: " .$model2->usuauser . " Contraseña: " . $model2->getPassword();
              $content = "<p>Email: " . $model2->usuaemai . "</p>";
              $content .= "<p>Usuario: " . $model2->usuauser."</p>";
              $content .= "<p>Contraseña: " . $model2->getPassword() ."</p>";
              Yii::$app->mailer->compose("@app/mail/layouts/html", ["content" => $content])
                  ->setTo($model2->usuaemai)
                  ->setFrom($emailAdmin)
                  ->setSubject($asunto)
                  ->setTextBody($cuerpo)
                  ->send();
              Yii::$app->session->setFlash('enviado');
          }
          Yii::$app->session->setFlash('noEnviado');
          return $this->refresh();
        }
        return $this->render('recuperar-datos', ['model' => $model]);
    }
}
