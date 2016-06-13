<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;
use yii\filters\AccessControl;
use app\models\CacCompras;
use app\models\CacVentas;
use yii\db\Query;

class CacReportesController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['compras', 'ventas'],
                'rules' => [
                    [
                        'actions' => ['compras', 'ventas'],
                        'allow' => true,
                        'roles' => ['administrador'],
                    ],
                    [
                        'actions' => ['compras', 'ventas'],
                        'allow' => true,
                        'roles' => ['usuario'],
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

    public function actionCompras()
    {
        if(\Yii::$app->user->can('administrador')){
          Yii::$app->view->params['pestanaAdministrador'] = 23;
          $this->layout ="administradorLayout";
        }else if(\Yii::$app->user->can('usuario')){
          Yii::$app->view->params['pestanaUsuario'] = 21;
          $this->layout ="usuarioLayout";
        }
        $vectorEquipos = [];
        $vectorEquipos = CacCompras::getEquiposAno('2016');
        $vectorEspecies = [];
        $vectorEspecies = CacCompras::getEspeciesAno('2016');
        $vectorAlimentos = [];
        $vectorAlimentos = CacCompras::getAlimentosAno('2016');

        return $this->render('compras', ['vectorEquipos' => $vectorEquipos, 'vectorEspecies' => $vectorEspecies, 'vectorAlimentos' => $vectorAlimentos]);
    }

    public function actionVentas()
    {
        if(\Yii::$app->user->can('administrador')){
          Yii::$app->view->params['pestanaAdministrador'] = 24;
          $this->layout ="administradorLayout";
        }else if(\Yii::$app->user->can('usuario')){
          Yii::$app->view->params['pestanaUsuario'] = 22;
          $this->layout ="usuarioLayout";
        }
        $totalVentas = CacVentas::getTotalVentasAno('2016');
        $ventasMes = CacVentas::getVentasMes('2016');
        $porcentajes = [];
        $cont = 0;
        foreach ($ventasMes as $value) {
          $porcentajes[$cont] = $value * 100 /$totalVentas;
          $cont ++;
        }
        return $this->render('ventas', ['porcentajes' => $porcentajes]);
    }
}
