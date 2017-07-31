<?php

namespace frontend\controllers;

use Yii;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\filters\VerbFilter;

use common\models\PrTracker;
use frontend\models\PrTrackerSearch;
use common\models\PrReport;
use frontend\models\PrReportSearch;
use common\models\PrItemDetails;
use common\models\PrItemSppmpDetails;
use common\models\TblLogs;

/**
 * PrTrackerController implements the CRUD actions for PrTracker model.
 */
class PrTrackerController extends Controller
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
     * Lists all PrTracker models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $searchModel = new PrTrackerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $query = PrTracker::find()
            ->andwhere(['like', 'tracker_title', 'asdasdasd'])
            ->all();

        if ( Yii::$app->request->isAjax ) {

            $html = $this->renderAjax('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'query' => $query,
            ]);
            
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'html' => $html,
                'url'  => Url::toRoute(['index']),
                'title' => 'PR Tracker',
            ];

        } else {
            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'query' => $query,
            ]);
        }
    }

    /**
     * Displays a single PrTracker model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $searchModel             = new PrReportSearch();
        $searchModel->tracker_id = $id;
        $dataProvider            = $searchModel->search(Yii::$app->request->queryParams);
        $model                   = $this->findModel($id);
        
        if ( Yii::$app->request->isAjax ) {

            $html =  $this->renderAjax('view', [
                'searchModel'  => $searchModel,
                'dataProvider' => $dataProvider,
                'model'        => $model,
            ]);
            
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'html'  => $html,
                'url'   => Url::toRoute(['view', 'id' => $id]),
                'title' => $model->tracker_no,
            ];

        } else {
            return $this->render('view', [
                'searchModel'  => $searchModel,
                'dataProvider' => $dataProvider,
                'model'        => $model,
            ]);
        }
    }

    /**
     * Creates a new PrTracker model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $result = false;
        $tracker = Yii::$app->request->post('PrTracker');

        if ( $tracker ) {

            $model = new PrTracker();

            $code = explode("|", $tracker['unit_responsible']);   // PARSE CODE
            $date = explode("-", $tracker['date_created']);   // PARSE DATE

            $sequence = PrTracker::getTrackerCount();
            $tracknum = PrTracker::getTrackerNo();
            $seq      = $tracknum['tracker_seq'];

            if($sequence > 0)
            {
                $temp = $seq + 1;
                $model->tracker_seq = str_pad($temp, 4, '0', STR_PAD_LEFT);
            } else {
                 $model->tracker_seq = '0001';
            }
            
            $model->tracker_year        = $date[0];    // RETURNS YEAR (yyyy)
            $model->tracker_month       = $date[1];   // RETURNS MONTH (mm)
            $model->responsibility_code = $code[0];
            $model->unit_responsible    = $code[1];
            $model->tracker_no          = 'KC-'.$date[0].'-'.$date[1].'-'.$model->tracker_seq;
            $model->date_created        = $tracker['date_created'] . ' ' . date("H:i:s");
            $model->date_updated        = $tracker['date_updated'];
            $model->tracker_title       = $tracker['tracker_title'];
            $model->proponent           = $tracker['proponent'];
            $model->encoder             = $tracker['encoder'];
            
            if ( $model->save() ) {
                $log = new TblLogs();

                $log->encoder  = Yii::$app->user->identity->id;
                $log->action   = 0;
                $log->tbl_name = 'pr_tracker';
                $log->tbl_col  = 'pr_tracker_id';
                $log->tbl_id   = $model['pr_tracker_id'];
                $log->details  = 'created new tracker with tracking number ##' . $model['tracker_no'].'##.';
                $log->log_date = date("Y-m-d H:i:s");

                if ( $log->save() ) {
                    $result = true;
                }
            }

            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'result' => $result,
                'model'  => $model,
                'url'    => Url::toRoute(['view', 'id' => $model->pr_tracker_id]),
            ];

        }
    }

    /**
     * Updates an existing PrTracker model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = $this->findModel($id);

        if (Yii::$app->request->isAjax) {

            $html = $this->renderAjax('update', [
                'model' => $model,
            ]);

            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'html'  => $html,
                'url'   => Url::toRoute(['update', 'id' => $id]),
                'title' => 'Update Tracker',
            ];

        } elseif ($model->load(Yii::$app->request->post())) {

            $model->save();
            //Yii::$app->response->format = Response::FORMAT_JSON;

            Yii::$app->session->setFlash('success', 'Updated Successfully');
            return $this->redirect(['view', 'id' => $model->pr_tracker_id]);

        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdateTracker($id)
    {
        $result = false;
        $model = $this->findModel($id);
        $tracker = Yii::$app->request->post('PrTracker');

        if ( $tracker ) {

            $code = explode("|", $tracker['unit_responsible']);   // PARSE CODE

            $model->responsibility_code = $code[0];
            $model->unit_responsible    = $code[1];
            $model->tracker_title       = $tracker['tracker_title'];
            $model->proponent           = $tracker['proponent'];
            $model->date_updated        = $tracker['date_updated'];
            
            if ( $model->save() ) {
                $log = new TblLogs();

                $log->encoder  = Yii::$app->user->identity->id;
                $log->action   = 1;
                $log->tbl_name = "pr_tracker";
                $log->tbl_col  = "pr_tracker_id";
                $log->tbl_id   = $id;
                $log->details  = "Update Tracker";
                $log->log_date = date("Y-m-d H:i:s");

                if ( $log->save() ) {
                    $result = true;
                }
            }

            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'result' => $result,
                'model'  => $model,
                'url'    => Url::toRoute(['view', 'id' => $model->pr_tracker_id]),
            ];

        }
    }

    /**
     * Deletes an existing PrTracker model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model  = $this->findModel($id);
        $result = false;

        if ( Yii::$app->request->isAjax ) {

            $model->status = 0;
            if ($model->save()) {

                $select = PrReport::findAll(['tracker_id' => $id]);
                $sql    = "UPDATE pr_report SET status=0 WHERE pr_report.tracker_id = $id";
                $query  = Yii::$app->getDb()->createCommand($sql);

                if ( !empty($select) ) {

                    if ($query->execute()) {
                        $log = new TblLogs();

                        $log->encoder  = Yii::$app->user->identity->id;
                        $log->action   = 2;
                        $log->tbl_name = "pr_tracker";
                        $log->tbl_col  = "pr_tracker_id";
                        $log->tbl_id   = $id;
                        $log->details  = "Remove Tracker";
                        $log->log_date = date("Y-m-d H:i:s");

                        if ( $log->save() ) {
                            $result = true;
                        }  
                    }
                } else {
                    $log = new TblLogs();

                    $log->encoder  = Yii::$app->user->identity->id;
                    $log->action   = 2;
                    $log->tbl_name = "pr_tracker";
                    $log->tbl_col  = "pr_tracker_id";
                    $log->tbl_id   = $id;
                    $log->details  = "Remove Tracker";
                    $log->log_date = date("Y-m-d H:i:s");

                    if ( $log->save() ) {
                        $result = true;
                    }
                }
            } 

            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'result' => $result,
                'model'  => $model,
            ];

        }
    }

    /**
     * Deletes an existing PrTracker model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionRestore($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model  = $this->findModel($id);
        $result = false;

        if ( Yii::$app->request->isAjax ) {

            $model->status = 1;
            if ($model->save()) {

                $select = PrReport::findAll(['tracker_id' => $id]);
                $sql    = "UPDATE pr_report SET status=1 WHERE pr_report.tracker_id = $id";
                $query  = Yii::$app->getDb()->createCommand($sql);

                if ( !empty($select) ) {

                    if ($query->execute()) {
                        $log = new TblLogs();

                        $log->encoder  = Yii::$app->user->identity->id;
                        $log->action   = 3;
                        $log->tbl_name = "pr_tracker";
                        $log->tbl_col  = "pr_tracker_id";
                        $log->tbl_id   = $id;
                        $log->details  = "Restore Tracker";
                        $log->log_date = date("Y-m-d H:i:s");

                        if ( $log->save() ) {
                            $result = true;
                        }  
                    }
                } else {
                    $result = true; 
                }
                
            } 

            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'result' => $result,
                'model'  => $model,
            ];

        }
    }

    /**
     * Finds the PrTracker model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PrTracker the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PrTracker::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionCreateItems() 
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $pr         = new PrReport();
        $pr_items   = new PrItemDetails();
        $pr_sppmp   = new PrItemSppmpDetails();
        $form       = Yii::$app->request->post('PrReport');

        if ($form) {

            foreach ($form as $model) {
                $pr_type    = $form['pr_type'];
                $tracker_id = $form['tracker_id'];
            }

            $tracker = $this->findModel($tracker_id);

            switch ($pr_type) {
                case 0:
                    return $this->render('_form-ppmp', [
                        'pr_model' => $pr,
                        'pr_type'  => $pr_type,
                        'pr_items' => $pr_items,
                        'tracker'  => $tracker,
                    ]);
                    break;
                
                case 1:
                    return $this->render('_form-sppmp', [
                        'pr_model' => $pr,
                        'pr_type'  => $pr_type,
                        'pr_sppmp' => $pr_sppmp,
                        'tracker'  => $tracker,
                    ]);
                    break;
            }
        }

        /*if ( Yii::$app->request->isAjax && $form) {

            foreach ($form as $model) {
                $pr_type    = $form['pr_type'];
                $tracker_id = $form['tracker_id'];
            }

            $tracker = $this->findModel($tracker_id);

            switch ($pr_type) {
                case 0:
                    $html =  $this->render('_form-ppmp', [
                        'pr_model' => $pr,
                        'pr_type'  => $pr_type,
                        'pr_items' => $pr_items,
                        'tracker'  => $tracker,
                    ]);

                    Yii::$app->response->format = Response::FORMAT_JSON;
                    return [
                        'html'  => $html,
                        'url'   => Url::toRoute(['create-items']),
                        'title' => 'Create PR',
                    ];

                    break;
                
                case 1:
                    $html = $this->render('_form-sppmp', [
                        'pr_model' => $pr,
                        'pr_type'  => $pr_type,
                        'pr_sppmp' => $pr_sppmp,
                        'tracker'  => $tracker,
                    ]);

                    Yii::$app->response->format = Response::FORMAT_JSON;
                    return [
                        'html'  => $html,
                        'url'   => Url::toRoute(['create-items']),
                        'title' => 'Create PR',
                    ];
                    
                    break;
            }
        }*/
    }
}
