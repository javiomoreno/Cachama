<?php

namespace app\controllers;

use Yii;
use app\models\CacEquipos;
use app\models\search\CacEquiposSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\filters\AccessControl;

/**
 * CacEquiposController implements the CRUD actions for CacEquipos model.
 */
class CacEquiposController extends Controller
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
     * Lists all CacEquipos models.
     * @return mixed
     */
    public function actionIndex()
    {
        Yii::$app->view->params['pestanaAdministrador'] = 4;
        $this->layout ="administradorLayout";
        $model = CacEquipos::find()->all();
        return $this->render('index', [
            'model' => $model,
        ]);
    }

    /**
     * Displays a single CacEquipos model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        Yii::$app->view->params['pestanaAdministrador'] = 4;
        $this->layout ="administradorLayout";
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new CacEquipos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        Yii::$app->view->params['pestanaAdministrador'] = 5;
        $this->layout ="administradorLayout";
        $model = new CacEquipos();

        if ($model->load(Yii::$app->request->post())) {
            $file = UploadedFile::getInstance($model, 'equiimag');
            $type = pathinfo($file, PATHINFO_EXTENSION);
            $model->equicodi = 'data:image/' . $type . ';base64,';
            $model->equiimag = file_get_contents($file->tempName);
            $model->usuamodi = \Yii::$app->user->getId();
            $model->fechmodi = date('Y-m-d H:i:s');
            if($model->save()){
              return $this->redirect(['view', 'id' => $model->equiiden]);
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
     * Updates an existing CacEquipos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        Yii::$app->view->params['pestanaAdministrador'] = 4;
        $this->layout ="administradorLayout";
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
          $file = UploadedFile::getInstance($model, 'equiimag');
          $type = pathinfo($file, PATHINFO_EXTENSION);
          $model->equicodi = 'data:image/' . $type . ';base64,';
          $model->equiimag = file_get_contents($file->tempName);
          $model->usuamodi = \Yii::$app->user->getId();
          $model->fechmodi = date('Y-m-d H:i:s');
          if($model->save()){
            return $this->redirect(['view', 'id' => $model->equiiden]);
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
     * Deletes an existing CacEquipos model.
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
     * Finds the CacEquipos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CacEquipos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CacEquipos::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
