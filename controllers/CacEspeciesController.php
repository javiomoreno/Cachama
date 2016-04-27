<?php

namespace app\controllers;

use Yii;
use app\models\CacEspecies;
use app\models\CacCompras;
use app\models\search\CacEspeciesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\filters\AccessControl;
use yii\helpers\BaseJson;

/**
 * CacEspeciesController implements the CRUD actions for CacEspecies model.
 */
class CacEspeciesController extends Controller
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
     * Lists all CacEspecies models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(\Yii::$app->user->can('administrador')){
          Yii::$app->view->params['pestanaAdministrador'] = 8;
          $this->layout ="administradorLayout";
        }else if(\Yii::$app->user->can('usuario')){
          Yii::$app->view->params['pestanaUsuario'] = 8;
          $this->layout ="usuarioLayout";
        }
        $model = CacEspecies::find()->all();
        return $this->render('index', [
            'model' => $model,
        ]);
    }

    /**
     * Displays a single CacEspecies model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        if(\Yii::$app->user->can('administrador')){
          Yii::$app->view->params['pestanaAdministrador'] = 8;
          $this->layout ="administradorLayout";
        }else if(\Yii::$app->user->can('usuario')){
          Yii::$app->view->params['pestanaUsuario'] = 8;
          $this->layout ="usuarioLayout";
        }
        $model2 = CacCompras::find()->where(['cac_especies_espeiden' => $id])->one();
        return $this->render('view', [
            'model' => $this->findModel($id), 'model2' => $model2,
        ]);
    }

    /**
     * Creates a new CacEspecies model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(\Yii::$app->user->can('administrador')){
          Yii::$app->view->params['pestanaAdministrador'] = 9;
          $this->layout ="administradorLayout";
        }else if(\Yii::$app->user->can('usuario')){
          Yii::$app->view->params['pestanaUsuario'] = 9;
          $this->layout ="usuarioLayout";
        }
        $model = new CacEspecies();
        $model2 = new CacCompras();

        if ($model->load(Yii::$app->request->post()) && $model2->load(Yii::$app->request->post())) {
            $file = UploadedFile::getInstance($model, 'espeimag');
            $type = pathinfo($file, PATHINFO_EXTENSION);
            $model->especodi = 'data:image/' . $type . ';base64,';
            $model->espeimag = file_get_contents($file->tempName);
            $model->usuamodi = \Yii::$app->user->getId();
            $model->fechmodi = date('Y-m-d H:i:s');
            $model2->cac_usuarios_usuaiden = \Yii::$app->user->getId();
            if($model->save()){
                $model2->cac_especies_espeiden = $model->espeiden;
                $model2->usuamodi = \Yii::$app->user->getId();
                $model2->fechmodi = date('Y-m-d H:i:s');
                if(!$model2->save()){
                  return $this->render('create', [
                      'model' => $model, 'model2' => $model2,
                  ]);
                }
                return $this->redirect(['view', 'id' => $model->espeiden]);
            }
        } else {
            return $this->render('create', [
                'model' => $model, 'model2' => $model2,
            ]);
        }
    }

    /**
     * Updates an existing CacEspecies model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if(\Yii::$app->user->can('administrador')){
          Yii::$app->view->params['pestanaAdministrador'] = 8;
          $this->layout ="administradorLayout";
        }else if(\Yii::$app->user->can('usuario')){
          Yii::$app->view->params['pestanaUsuario'] = 8;
          $this->layout ="usuarioLayout";
        }
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
          $file = UploadedFile::getInstance($model, 'espeimag');
          $type = pathinfo($file, PATHINFO_EXTENSION);
          $model->especodi = 'data:image/' . $type . ';base64,';
          $model->espeimag = file_get_contents($file->tempName);
          $model->usuamodi = \Yii::$app->user->getId();
          $model->fechmodi = date('Y-m-d H:i:s');
          if($model->save()){
            return $this->redirect(['view', 'id' => $model->espeiden]);
          }
          return $this->render('update', [
              'model' => $model,
          ]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CacEspecies model.
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
     * Finds the CacEspecies model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CacEspecies the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CacEspecies::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionEspecie($id){
      $opciones = $this->findModel($id);
      $opciones2 = CacCompras::find()->where(['cac_especies_espeiden' => $id])->one();
      $especie = array(
          "espenomb" => $opciones->espenomb,
          "especant" => $opciones2->compcant,
      );
      print_r(json_encode($especie));
    }
}
