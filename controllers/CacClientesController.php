<?php

namespace app\controllers;

use Yii;
use app\models\CacUsuarios;
use app\models\search\CacUsuariosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\filters\AccessControl;

/**
 * CacUsuariosController implements the CRUD actions for CacUsuarios model.
 */
class CacClientesController extends Controller
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
     * Lists all CacUsuarios models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(\Yii::$app->user->can('administrador')){
          Yii::$app->view->params['pestanaAdministrador'] = 12;
          $this->layout ="administradorLayout";
        }else if(\Yii::$app->user->can('usuario')){
          Yii::$app->view->params['pestanaUsuario'] = 10;
          $this->layout ="usuarioLayout";
        }
        $model = CacUsuarios::find()->where(['cac_tipoUsuarios_tiusiden'=>4])->all();
        return $this->render('index', [
            'model' => $model,
        ]);
    }

    /**
     * Displays a single CacUsuarios model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        if(\Yii::$app->user->can('administrador')){
          Yii::$app->view->params['pestanaAdministrador'] = 12;
          $this->layout ="administradorLayout";
        }else if(\Yii::$app->user->can('usuario')){
          Yii::$app->view->params['pestanaUsuario'] = 10;
          $this->layout ="usuarioLayout";
        }
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new CacUsuarios model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(\Yii::$app->user->can('administrador')){
          Yii::$app->view->params['pestanaAdministrador'] = 13;
          $this->layout ="administradorLayout";
        }else if(\Yii::$app->user->can('usuario')){
          Yii::$app->view->params['pestanaUsuario'] = 11;
          $this->layout ="usuarioLayout";
        }
        $model = new CacUsuarios();

        if ($model->load(Yii::$app->request->post())) {
            $file = UploadedFile::getInstance($model, 'usuaimag');
            $type = pathinfo($file, PATHINFO_EXTENSION);
            $model->usuacodi = 'data:image/' . $type . ';base64,';
            $model->usuaimag = file_get_contents($file->tempName);
            $model->usuamodi = \Yii::$app->user->getId();
            $model->fechmodi = date('Y-m-d H:i:s');
            $model->cac_tipoUsuarios_tiusiden = 4;
            if($model->save()){
              return $this->redirect(['view', 'id' => $model->usuaiden]);
            }
            return $this->render('create', [
                'model' => $model,
            ]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing CacUsuarios model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if(\Yii::$app->user->can('administrador')){
          Yii::$app->view->params['pestanaAdministrador'] = 12;
          $this->layout ="administradorLayout";
        }else if(\Yii::$app->user->can('usuario')){
          Yii::$app->view->params['pestanaUsuario'] = 10;
          $this->layout ="usuarioLayout";
        }
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $file = UploadedFile::getInstance($model, 'usuaimag');
            $type = pathinfo($file, PATHINFO_EXTENSION);
            $model->usuacodi = 'data:image/' . $type . ';base64,';
            $model->usuaimag = file_get_contents($file->tempName);
            $model->usuamodi = \Yii::$app->user->getId();
            $model->fechmodi = date('Y-m-d H:i:s');
            if($model->save()){
              return $this->redirect(['view', 'id' => $model->usuaiden]);
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
     * Deletes an existing CacUsuarios model.
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
     * Finds the CacUsuarios model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CacUsuarios the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CacUsuarios::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
