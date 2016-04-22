<?php

namespace app\controllers;

use Yii;
use app\models\CacProveedores;
use app\models\search\CacProveedoresSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\filters\AccessControl;

/**
 * CacProveedoresController implements the CRUD actions for CacProveedores model.
 */
class CacProveedoresController extends Controller
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
     * Lists all CacProveedores models.
     * @return mixed
     */
    public function actionIndex()
    {
        Yii::$app->view->params['pestanaAdministrador'] = 16;
        $this->layout ="administradorLayout";
        $model = CacProveedores::find()->all();
        return $this->render('index', [
            'model' => $model,
        ]);
    }

    /**
     * Displays a single CacProveedores model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        Yii::$app->view->params['pestanaAdministrador'] = 16;
        $this->layout ="administradorLayout";
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new CacProveedores model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        Yii::$app->view->params['pestanaAdministrador'] = 17;
        $this->layout ="administradorLayout";
        $model = new CacProveedores();

        if ($model->load(Yii::$app->request->post())) {
          $file = UploadedFile::getInstance($model, 'provimag');
          $type = pathinfo($file, PATHINFO_EXTENSION);
          $model->provcodi = 'data:image/' . $type . ';base64,';
          $model->provimag = file_get_contents($file->tempName);
          $model->usuamodi = \Yii::$app->user->getId();
          $model->fechmodi = date('Y-m-d H:i:s');
          if($model->save()){
            return $this->redirect(['view', 'id' => $model->providen]);
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
     * Updates an existing CacProveedores model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        Yii::$app->view->params['pestanaAdministrador'] = 16;
        $this->layout ="administradorLayout";
        $model = $this->findModel($id);
        $oldImag = $model->provimag;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
          $file = UploadedFile::getInstance($model, 'provimag');
          $type = pathinfo($file, PATHINFO_EXTENSION);
          $model->provcodi = 'data:image/' . $type . ';base64,';
          $model->provimag = file_get_contents($file->tempName);
          $model->usuamodi = \Yii::$app->user->getId();
          $model->fechmodi = date('Y-m-d H:i:s');
          if($model->save()){
            return $this->redirect(['view', 'id' => $model->providen]);
          }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CacProveedores model.
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
     * Finds the CacProveedores model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CacProveedores the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CacProveedores::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
