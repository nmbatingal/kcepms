<?php

namespace frontend\controllers;

use Yii;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\filters\VerbFilter;

use common\models\PpmpItemOriginal;
use frontend\models\PpmpItemOriginalSearch;

use common\models\Ppmp;

/**
 * PpmpItemOriginalController implements the CRUD actions for PpmpItemOriginal model.
 */
class PpmpItemOriginalController extends Controller
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
     * Lists all PpmpItemOriginal models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        $model = Ppmp::findOne(['ppmp_id'=>$id]);
        $searchModel = new PpmpItemOriginalSearch();
        $searchModel->ppmp_id = $id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if ( Yii::$app->request->isAjax ) {

            $html = $this->renderAjax('index', [
                        'searchModel'   => $searchModel,
                        'dataProvider'  => $dataProvider,
                        'ppmp_id'       => $id,
                        'model'         => $model,
                    ]);

            Yii::$app->response->format = Response::FORMAT_JSON;

            return [
                'html'  => $html,
                'url'  => Url::toRoute(['index', 'id' => $id]),
                'title' => 'PPMP Original',
            ];

        } else {
            return $this->render('index', [
                'searchModel'   => $searchModel,
                'dataProvider'  => $dataProvider,
                'ppmp_id'       => $id,
                'model'         => $model,
            ]);
        }
    }

    /**
     * Displays a single PpmpItemOriginal model.
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
     * Creates a new PpmpItemOriginal model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PpmpItemOriginal();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ppmp_item_original_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing PpmpItemOriginal model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ppmp_item_original_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionPartialUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ppmp_item_original_id]);
        } else {
            $html = $this->renderPartial('update', [
                'model' => $model,
            ]);
        }

        Yii::$app->response->format = Response::FORMAT_JSON;
        return [
            'html' => $html,
            'url'  => Url::toRoute(['update', 'id' => $id]),
            'title' => 'PPMP Item Update',
        ];
    }

    /**
     * Deletes an existing PpmpItemOriginal model.
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
     * Finds the PpmpItemOriginal model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PpmpItemOriginal the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PpmpItemOriginal::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionPerItem($id)
    {
        $model = $this->findModel($id);

        Yii::$app->response->format = Response::FORMAT_JSON;
        return $this->renderAjax('_per-item', [
            'model' => $model,
        ]);
    }
}
