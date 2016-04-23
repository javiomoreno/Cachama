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
class CacUsuariosController extends Controller
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
     * Lists all CacUsuarios models.
     * @return mixed
     */
    public function actionIndex()
    {
        Yii::$app->view->params['pestanaAdministrador'] = 10;
        $this->layout ="administradorLayout";
        $model = CacUsuarios::find()->where('cac_tipoUsuarios_tiusiden != 4 and usuaiden != '.\Yii::$app->user->getId())->all();
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
        Yii::$app->view->params['pestanaAdministrador'] = 10;
        $this->layout ="administradorLayout";
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
        Yii::$app->view->params['pestanaAdministrador'] = 11;
        $this->layout ="administradorLayout";
        $this->layout ="administradorLayout";
        $model = new CacUsuarios();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $file = UploadedFile::getInstance($model, 'usuaimag');
            $type = pathinfo($file, PATHINFO_EXTENSION);
            $model->usuacodi = 'data:image/' . $type . ';base64,';
            $model->usuaimag = file_get_contents($file->tempName);
            $model->usuamodi = \Yii::$app->user->getId();
            $model->fechmodi = date('Y-m-d H:i:s');
            $model->setPassword($model->usuapass);
            if($model->save()){
              $auth = \Yii::$app->authManager;
              if ($model->cac_tipoUsuarios_tiusiden == 1) {
                  $role = $auth->getRole('administrador');
                  $auth->assign($role, $model->getId());
              }
              else if ($model->cac_tipoUsuarios_tiusiden == 2) {
                  $role = $auth->getRole('usuario');
                  $auth->assign($role, $model->getId());
              }
              else if ($model->cac_tipoUsuarios_tiusiden == 3) {
                  $role = $auth->getRole('empleado');
                  $auth->assign($role, $model->getId());
              }
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
        Yii::$app->view->params['pestanaAdministrador'] = 10;
        $this->layout ="administradorLayout";
        $model = $this->findModel($id);

        $claveOld = $model->usuapass;
        if ($model->load(Yii::$app->request->post())) {
          if ($model->usuapass !== $claveOld) {
            $model->setPassword($model->usuapass);
          }
          $file = UploadedFile::getInstance($model, 'usuaimag');
          $type = pathinfo($file, PATHINFO_EXTENSION);
          $model->usuacodi = 'data:image/' . $type . ';base64,';
          $model->usuaimag = file_get_contents($file->tempName);
          $model->usuamodi = \Yii::$app->user->getId();
          $model->fechmodi = date('Y-m-d H:i:s');
          $model->save();
          return $this->redirect(['view', 'id' => $model->usuaiden]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
        return $this->render('update', [
            'model' => $model,
        ]);
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
