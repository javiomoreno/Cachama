<?php

namespace app\controllers;

use Yii;
use app\models\CacRegistroDiario;
use app\models\CacCompras;
use app\models\CacAlimentos;
use app\models\CacLagunasEspecies;
use app\models\CacEspecies;
use app\models\search\CacRegistroDiarioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * CacRegistroDiarioController implements the CRUD actions for CacRegistroDiario model.
 */
class CacRegistroDiarioController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'create', 'view', 'update'],
                'rules' => [
                    [
                        'actions' => ['index', 'create', 'view', 'update'],
                        'allow' => true,
                        'roles' => ['administrador'],
                    ],
                    [
                        'actions' => ['index', 'create', 'view', 'update'],
                        'allow' => true,
                        'roles' => ['usuario'],
                    ],
                    [
                        'actions' => ['index', 'create', 'view', 'update'],
                        'allow' => true,
                        'roles' => ['empleado'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all CacRegistroDiario models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(\Yii::$app->user->can('administrador')){
          Yii::$app->view->params['pestanaAdministrador'] = 19;
          $this->layout ="administradorLayout";
        }else if(\Yii::$app->user->can('usuario')){
          Yii::$app->view->params['pestanaUsuario'] = 17;
          $this->layout ="usuarioLayout";
        }else if(\Yii::$app->user->can('empleado')){
          Yii::$app->view->params['pestanaEmpleado'] = 5;
          $this->layout ="empleadoLayout";
        }
        $model = CacRegistroDiario::find()->all();
        return $this->render('index', [
            'model' => $model,
        ]);
    }

    /**
     * Displays a single CacRegistroDiario model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        if(\Yii::$app->user->can('administrador')){
          Yii::$app->view->params['pestanaAdministrador'] = 19;
          $this->layout ="administradorLayout";
        }else if(\Yii::$app->user->can('usuario')){
          Yii::$app->view->params['pestanaUsuario'] = 17;
          $this->layout ="usuarioLayout";
        }else if(\Yii::$app->user->can('empleado')){
          Yii::$app->view->params['pestanaEmpleado'] = 5;
          $this->layout ="empleadoLayout";
        }
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new CacRegistroDiario model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(\Yii::$app->user->can('administrador')){
          Yii::$app->view->params['pestanaAdministrador'] = 20;
          $this->layout ="administradorLayout";
        }else if(\Yii::$app->user->can('usuario')){
          Yii::$app->view->params['pestanaUsuario'] = 18;
          $this->layout ="usuarioLayout";
        }else if(\Yii::$app->user->can('empleado')){
          Yii::$app->view->params['pestanaEmpleado'] = 6;
          $this->layout ="empleadoLayout";
        }
        $model = new CacRegistroDiario();

        if ($model->load(Yii::$app->request->post())) {
          $modelCompras = CacCompras::find()->where(['cac_alimentos_alimiden' => $model->cac_alimentos_alimiden])->one();
          $modelAlimentos = CacAlimentos::find()->where(['alimiden' => $model->cac_alimentos_alimiden])->one();
          $modelLagunasEspecies = CacLagunasEspecies::find()->where(['cac_lagunas_laguiden'=>$model->cac_lagunas_laguiden])->one();
          if ($model->redicaal > $modelAlimentos->alimpeto) {
            Yii::$app->session->setFlash('noCantidadAlimento');
            return $this->render('create', [
                'model' => $model,
            ]);
          }
          elseif ($model->redicamu > $modelLagunasEspecies->laesdisp) {
            Yii::$app->session->setFlash('noCantidadMuertes');
            return $this->render('create', [
                'model' => $model,
            ]);
          }
          else{
            $model->usuamodi = \Yii::$app->user->getId();
            $model->fechmodi = date('Y-m-d H:i:s');
            if($model->save()){
              $modelAlimentos->alimpeto = ($modelAlimentos->alimpeto - $model->redicaal);
              $modelAlimentos->save();
              $modelCompras->compcant = ceil(($modelAlimentos->alimpeto / $modelAlimentos->alimpeun));
              $modelCompras->save();
              $modelLagunasEspecies->laesdisp = ($modelLagunasEspecies->laesdisp - $model->redicamu);
              $modelLagunasEspecies->save();
              return $this->redirect(['view', 'id' => $model->rediiden]);
            }
          }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing CacRegistroDiario model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->rediiden]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CacRegistroDiario model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CacRegistroDiario model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CacRegistroDiario the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CacRegistroDiario::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
