<?php

namespace app\controllers;

use Yii;
use app\models\CacLagunasEspecies;
use app\models\CacLagunas;
use app\models\CacCompras;
use app\models\search\CacLagunasEspeciesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\BaseJson;
use yii\filters\AccessControl;

/**
 * CacLagunasEspeciesController implements the CRUD actions for CacLagunasEspecies model.
 */
class CacLagunasEspeciesController extends Controller
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
     * Lists all CacLagunasEspecies models.
     * @return mixed
     */
    public function actionIndex()
    {
      if(\Yii::$app->user->can('administrador')){
        Yii::$app->view->params['pestanaAdministrador'] = 17;
        $this->layout ="administradorLayout";
      }else if(\Yii::$app->user->can('usuario')){
        Yii::$app->view->params['pestanaUsuario'] = 15;
        $this->layout ="usuarioLayout";
      }else if(\Yii::$app->user->can('empleado')){
        Yii::$app->view->params['pestanaEmpleado'] = 3;
        $this->layout ="empleadoLayout";
      }
      $model = CacLagunasEspecies::find()->all();
      return $this->render('index', [
          'model' => $model,
      ]);
    }

    /**
     * Displays a single CacLagunasEspecies model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        if(\Yii::$app->user->can('administrador')){
          Yii::$app->view->params['pestanaAdministrador'] = 17;
          $this->layout ="administradorLayout";
        }else if(\Yii::$app->user->can('usuario')){
          Yii::$app->view->params['pestanaUsuario'] = 15;
          $this->layout ="usuarioLayout";
        }else if(\Yii::$app->user->can('empleado')){
          Yii::$app->view->params['pestanaEmpleado'] = 3;
          $this->layout ="empleadoLayout";
        }
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new CacLagunasEspecies model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(\Yii::$app->user->can('administrador')){
          Yii::$app->view->params['pestanaAdministrador'] = 18;
          $this->layout ="administradorLayout";
        }else if(\Yii::$app->user->can('usuario')){
          Yii::$app->view->params['pestanaUsuario'] = 16;
          $this->layout ="usuarioLayout";
        }else if(\Yii::$app->user->can('empleado')){
          Yii::$app->view->params['pestanaEmpleado'] = 4;
          $this->layout ="empleadoLayout";
        }
        $model = new CacLagunasEspecies();

        if ($model->load(Yii::$app->request->post())) {
          $modelLagunas = CacLagunas::find()->where(['laguiden' => $model->cac_lagunas_laguiden])->one();
          if ($model->laestota > $modelLagunas->lagucapa) {
            Yii::$app->session->setFlash('noCapacidad');
            return $this->render('create', [
                'model' => $model,
            ]);
          }
          else {
            $model->laesdisp = $model->laestota;
            $model->usuamodi = \Yii::$app->user->getId();
            $model->fechmodi = date('Y-m-d H:i:s');
            if ($model->save()) {
              $modelLagunas->cac_estados_estaiden = 3;
              $modelLagunas->save();
              $modelCompras = CacCompras::find()->where(['cac_especies_espeiden' => $model->cac_especies_espeiden])->one();
              $modelCompras->compcant = ($modelCompras->compcant - $model->laestota);
              $modelCompras->save();
              return $this->redirect(['view', 'id' => $model->laesiden]);
            }
          }

        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing CacLagunasEspecies model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->laesinde]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CacLagunasEspecies model.
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
     * Finds the CacLagunasEspecies model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CacLagunasEspecies the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CacLagunasEspecies::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionLagunaEspecie($id){
      $opciones = CacLagunasEspecies::find()->one();
      $opciones2 = CacLagunas::find()->where(['laguiden'=>$opciones->cac_lagunas_laguiden])->one();
      $laguna = array(
          "lagunomb" => $opciones2->lagunomb,
          "lagucant" => $opciones->laesdisp,
      );
      print_r(json_encode($laguna));
    }
}
