<?php

namespace app\controllers;

use Yii;
use app\models\CacLagunas;
use app\models\search\CacLagunasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CacLagunasController implements the CRUD actions for CacLagunas model.
 */
class CacLagunasController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all CacLagunas models.
     * @return mixed
     */
    public function actionIndex()
    {
      Yii::$app->view->params['pestanaAdministrador'] = 2;
        $this->layout ="administradorLayout";
        $model = CacLagunas::find()->all();
        return $this->render('index', [
            'model' => $model,
        ]);
    }

    /**
     * Displays a single CacLagunas model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new CacLagunas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
      Yii::$app->view->params['pestanaAdministrador'] = 3;

        $this->layout ="administradorLayout";
        $model = new CacLagunas();

        if ($model->load(Yii::$app->request->post())) {
          $model->cac_usuarios_usuaiden = \Yii::$app->user->getId();
          if($model->save()){
            $model = CacLagunas::find()->all();
            return $this->render('index', [
                'model' => $model,
            ]);
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
     * Updates an existing CacLagunas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->laguiden]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CacLagunas model.
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
     * Finds the CacLagunas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CacLagunas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CacLagunas::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
