<?php

namespace app\controllers;

use Yii;
use app\models\CacAlimentos;
use app\models\CacCompras;
use app\models\search\CacAlimentosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\filters\AccessControl;
use yii\helpers\BaseJson;

/**
 * CacAlimentosController implements the CRUD actions for CacAlimentos model.
 */
class CacAlimentosController extends Controller
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
     * Lists all CacAlimentos models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(\Yii::$app->user->can('administrador')){
          Yii::$app->view->params['pestanaAdministrador'] = 6;
          $this->layout ="administradorLayout";
        }else if(\Yii::$app->user->can('usuario')){
          Yii::$app->view->params['pestanaUsuario'] = 6;
          $this->layout ="usuarioLayout";
        }
        $model = CacAlimentos::find()->all();
        return $this->render('index', [
            'model' => $model,
        ]);
    }

    /**
     * Displays a single CacAlimentos model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        if(\Yii::$app->user->can('administrador')){
          Yii::$app->view->params['pestanaAdministrador'] = 6;
          $this->layout ="administradorLayout";
        }else if(\Yii::$app->user->can('usuario')){
          Yii::$app->view->params['pestanaUsuario'] = 6;
          $this->layout ="usuarioLayout";
        }
        $model2 = CacCompras::find()->where(['cac_alimentos_alimiden' => $id])->one();
        return $this->render('view', [
            'model' => $this->findModel($id), 'model2' => $model2,
        ]);
    }

    /**
     * Creates a new CacAlimentos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(\Yii::$app->user->can('administrador')){
          Yii::$app->view->params['pestanaAdministrador'] = 7;
          $this->layout ="administradorLayout";
        }else if(\Yii::$app->user->can('usuario')){
          Yii::$app->view->params['pestanaUsuario'] = 7;
          $this->layout ="usuarioLayout";
        }
        $model = new CacAlimentos();
        $model2 = new CacCompras();

        if ($model->load(Yii::$app->request->post()) && $model2->load(Yii::$app->request->post())) {
            $file = UploadedFile::getInstance($model, 'alimimag');
            $type = pathinfo($file, PATHINFO_EXTENSION);
            $model->alimcodi = 'data:image/' . $type . ';base64,';
            $model->alimimag = file_get_contents($file->tempName);
            $model->usuamodi = \Yii::$app->user->getId();
            $model->fechmodi = date('Y-m-d H:i:s');
            $model2->cac_usuarios_usuaiden = \Yii::$app->user->getId();
            if($model->save()){
                $model2->cac_alimentos_alimiden = $model->alimiden;
                $model2->usuamodi = \Yii::$app->user->getId();
                $model2->fechmodi = date('Y-m-d H:i:s');
                if(!$model2->save()){
                  return $this->render('create', [
                      'model' => $model, 'model2' => $model2,
                  ]);
                }
                return $this->redirect(['view', 'id' => $model->alimiden]);
            }
            return $this->render('create', [
                'model' => $model, 'model2' => $model2,
            ]);
        } else {
            return $this->render('create', [
                'model' => $model, 'model2' => $model2,
            ]);
        }
    }

    /**
     * Updates an existing CacAlimentos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if(\Yii::$app->user->can('administrador')){
          Yii::$app->view->params['pestanaAdministrador'] = 6;
          $this->layout ="administradorLayout";
        }else if(\Yii::$app->user->can('usuario')){
          Yii::$app->view->params['pestanaUsuario'] = 6;
          $this->layout ="usuarioLayout";
        }
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $file = UploadedFile::getInstance($model, 'alimimag');
            $type = pathinfo($file, PATHINFO_EXTENSION);
            $model->alimcodi = 'data:image/' . $type . ';base64,';
            $model->alimimag = file_get_contents($file->tempName);
            $model->usuamodi = \Yii::$app->user->getId();
            $model->fechmodi = date('Y-m-d H:i:s');
            if($model->save()){
              return $this->redirect(['view', 'id' => $model->alimiden]);
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
     * Deletes an existing CacAlimentos model.
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
     * Finds the CacAlimentos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CacAlimentos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CacAlimentos::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionAlimento($id){
      $opciones = $this->findModel($id);
      $alimento = array(
          "alimnomb" => $opciones->alimnomb,
          "alimcant" => $opciones->alimpeto,
      );
      print_r(json_encode($alimento));
    }
}
