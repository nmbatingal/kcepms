<?php

namespace frontend\controllers;

use Yii;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\filters\VerbFilter;

use common\models\PrReport;
use frontend\models\PrReportSearch;
use common\models\PrItemDetails;
use common\models\PrItemSppmpDetails;
use common\models\PpmpItemDeduction;
use common\models\Ppmp;
use common\models\TblPrNo;

/**
 * PrReportController implements the CRUD actions for PrReport model.
 */
class PrReportController extends Controller
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
     * Lists all PrReport models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $searchModel = new PrReportSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PrReport model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model    = $this->findModel($id);

        if ( $model['pr_type'] == 0 ) {
            $pr_items = PrItemDetails::findAll(['pr_id' => $model['pr_id']]);
        } else {
            $pr_items = PrItemSppmpDetails::findAll(['pr_id' => $model['pr_id']]);
        }

        if ( Yii::$app->request->isAjax ) {

            $html = $this->renderAjax('view', [
                'model'    => $model,
                'pr_items' => $pr_items,
            ]);

            Yii::$app->response->format = Response::FORMAT_JSON;

            return [
                'html'  => $html,
                'url'   => Url::toRoute(['view', 'id' => $id]),
                'title' => $model->pr_no,
            ];

        } else {
            return $this->render('view', [
                'model'    => $model,
                'pr_items' => $pr_items,
            ]);
        }
    }

    /**
     * Creates a new PrReport model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    /*public function actionCreate()
    {
        $model = new PrReport();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->pr_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }*/

    public function actionCreate() 
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $result     = false;
        $pr_report  = Yii::$app->request->post('PrReport');
        $pr_items   = Yii::$app->request->post('PrItemDetails');
        $total_amount   = 0;

        if ( $pr_report && $pr_items ) {

            $model  = new PrReport();
            $tbl_pr = new TblPrNo();

            /*** VALIDATE PR NUMBER ***/
            $date = explode("-", $pr_report['date_created']);   // PARSE DATE
            $sequence = TblPrNo::getPrNumbers();

            if( !empty($sequence) ) {

                $temp = $sequence['pr_seq'] + 1;
                $model->pr_no      = str_pad($temp, 4, '0', STR_PAD_LEFT) .'-'. date("m-y", strtotime($pr_report['date_created']));
                $tbl_pr->pr_year   = date("y", strtotime($pr_report['date_created']));
                $tbl_pr->pr_month  = $date[1];
                $tbl_pr->pr_seq    = $temp;
                $tbl_pr->pr_no     = str_pad($temp, 4, '0', STR_PAD_LEFT) .'-'. date("m-y", strtotime($pr_report['date_created']));

            } else {
                $model->pr_no      = '0001'.'-'. date("m-y", strtotime($pr_report['date_created']));
                $tbl_pr->pr_year   = date("y", strtotime($pr_report['date_created']));
                $tbl_pr->pr_month  = $date[1];
                $tbl_pr->pr_seq    = '0001';
                $tbl_pr->pr_no     = '0001'.'-'. date("m-y", strtotime($pr_report['date_created']));
            }

            $model->tracker_id     = $pr_report['tracker_id'];
            $model->purpose        = $pr_report['purpose'];
            $model->date_created   = $pr_report['date_created'] . ' ' . date("H:i:s");
            $model->encoder        = $pr_report['encoder'];
            $model->pr_type        = $pr_report['pr_type'];
            $model->requested_by   = $pr_report['requested_by'];
            $model->approved_by    = $pr_report['approved_by'];

            if ( $model->save() ) {

                $month   = strtolower(date("F", strtotime($model['date_created'])));

                foreach ($pr_items['item_description'] as $i => $item_description) {

                    $item    = new PrItemDetails();

                    $item->pr_id                 = $model->pr_id;
                    $item->item_type             = $pr_items['item_type'][$i];
                    $item->ppmp_item_original_id = $pr_items['ppmp_item_original_id'][$i];
                    $item->group_label           = $pr_items['group_label'][$i];
                    $item->unit_id               = $pr_items['unit_id'][$i];
                    $item->item_description      = $item_description;
                    $item->add_description       = $pr_items['add_description'][$i];
                    $item->quantity              = $pr_items['quantity'][$i];
                    $item->item_price            = $pr_items['item_price'][$i];
                    $item->total_amount          = $pr_items['total_amount'][$i];

                    $total_amount += $pr_items['total_amount'][$i];

                    if ( $item->save() ) {

                        $deduct  = new PpmpItemDeduction();

                        $deduct->ppmp_item_original_id  = $item->ppmp_item_original_id;
                        $deduct->item_price             = $item->item_price;
                        $deduct->$month                 = $item->quantity;
                        $deduct->total_count            = $item->quantity;
                        $deduct->total_amount           = $item->total_amount;

                        if ( $deduct->save() ) {
                            $ppmp    = Ppmp::findOne(['ppmp_id' => $pr_items['ppmp_id'][$i]]);
                            $ppmp->deduction = $ppmp->deduction + $item->total_amount;
                            if ( $ppmp->save()) {
                                $result = true;  
                            }
                        }
                    }
                }
            }

            $pr  = $this->findModel($model->pr_id);
            $pr->total_pr_amount = $total_amount;

            if ( $pr->save() ) {

                $tbl_pr->pr_title      = $pr_report['purpose'];
                $tbl_pr->program       = $pr_report['program'];
                $tbl_pr->pr_amount     = $total_amount;
                $tbl_pr->requested_by  = $pr_report['proponent'];
                $tbl_pr->date_created  = $pr_report['date_created'];
                $tbl_pr->encoder       = $pr_report['encoder'];

                if ( $tbl_pr->save() ) {
                    $result = true;
                }
            }

            //Yii::$app->response->format = Response::FORMAT_JSON;
            return $this->redirect(['pr-report/view', 'id' => $model->pr_id]);
        }
    }

    public function actionCreateSppmp() 
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $result     = false;
        $pr_report  = Yii::$app->request->post('PrReport');
        $pr_items   = Yii::$app->request->post('PrItemSppmpDetails');
        $total_amount   = 0;

        if ( $pr_report && $pr_items ) {

            $model  = new PrReport();
            $tbl_pr = new TblPrNo();

            /*** VALIDATE PR NUMBER ***/
            $date = explode("-", $pr_report['date_created']);   // PARSE DATE
            $sequence = TblPrNo::getPrNumbers();

            if( !empty($sequence) ) {

                $temp = $sequence['pr_seq'] + 1;
                $model->pr_no      = str_pad($temp, 4, '0', STR_PAD_LEFT) .'-'. date("m-y", strtotime($pr_report['date_created']));
                $tbl_pr->pr_year   = date("y", strtotime($pr_report['date_created']));
                $tbl_pr->pr_month  = $date[1];
                $tbl_pr->pr_seq    = $temp;
                $tbl_pr->pr_no     = str_pad($temp, 4, '0', STR_PAD_LEFT) .'-'. date("m-y", strtotime($pr_report['date_created']));

            } else {
                $model->pr_no      = '0001'.'-'. date("m-y", strtotime($pr_report['date_created']));
                $tbl_pr->pr_year   = date("y", strtotime($pr_report['date_created']));
                $tbl_pr->pr_month  = $date[1];
                $tbl_pr->pr_seq    = '0001';
                $tbl_pr->pr_no     = '0001'.'-'. date("m-y", strtotime($pr_report['date_created']));
            }

            $model->tracker_id     = $pr_report['tracker_id'];
            $model->purpose        = $pr_report['purpose'];
            $model->date_created   = $pr_report['date_created'] . ' ' . date("H:i:s");
            $model->encoder        = $pr_report['encoder'];
            $model->pr_type        = $pr_report['pr_type'];
            $model->requested_by   = $pr_report['requested_by'];
            $model->noted_by       = $pr_report['noted_by'];
            $model->reviewed_by    = $pr_report['reviewed_by'];
            $model->approved_by    = $pr_report['approved_by'];

            if ( $model->save() ) {

                foreach ($pr_items['item_description'] as $i => $item_description) {

                    $item    = new PrItemSppmpDetails();

                    $item->pr_id                 = $model->pr_id;
                    $item->item_type             = isset($pr_items['item_type'][$i]) ? $pr_items['item_type'][$i] : '0';
                    $item->group_label           = isset($pr_items['group_label'][$i]) ? $pr_items['group_label'][$i] : NULL;
                    $item->item_description      = $item_description;
                    $item->unit_id               = $pr_items['unit_id'][$i];
                    $item->add_description       = $pr_items['add_description'][$i];
                    $item->january               = $pr_items['january'][$i];
                    $item->february              = $pr_items['february'][$i];
                    $item->march                 = $pr_items['march'][$i];
                    $item->april                 = $pr_items['april'][$i];
                    $item->may                   = $pr_items['may'][$i];
                    $item->june                  = $pr_items['june'][$i];
                    $item->july                  = $pr_items['july'][$i];
                    $item->august                = $pr_items['august'][$i];
                    $item->september             = $pr_items['september'][$i];
                    $item->october               = $pr_items['october'][$i];
                    $item->november              = $pr_items['november'][$i];
                    $item->december              = $pr_items['december'][$i];
                    $item->quantity              = $pr_items['quantity'][$i];
                    $item->item_price            = $pr_items['item_price'][$i];
                    $item->total_amount          = $pr_items['total_amount'][$i];

                    $total_amount += $pr_items['total_amount'][$i];

                    if ( $item->save()) {
                        $result = true;  
                    }
                }
            }

            $pr  = $this->findModel($model->pr_id);
            $pr->total_pr_amount = $total_amount;

            if ( $pr->save() ) {

                $tbl_pr->pr_title      = $pr_report['purpose'];
                $tbl_pr->program       = $pr_report['program'];
                $tbl_pr->pr_amount     = $total_amount;
                $tbl_pr->requested_by  = $pr_report['proponent'];
                $tbl_pr->date_created  = $pr_report['date_created'];
                $tbl_pr->encoder       = $pr_report['encoder'];

                if ( $tbl_pr->save() ) {
                    $result = true;
                }
            }

            //Yii::$app->response->format = Response::FORMAT_JSON;
            return $this->redirect(['pr-report/view', 'id' => $model->pr_id]);
        }
    }

    /**
     * Updates an existing PrReport model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $result     = false;
        $pr_report  = Yii::$app->request->post('PrReport');
        $model = $this->findModel($id);

        if ($pr_report) {

            $model->purpose      = $pr_report['purpose'];
            $model->ppmp_mode    = $pr_report['ppmp_mode'];
            $model->requested_by = $pr_report['requested_by'];
            $model->noted_by     = $pr_report['noted_by'];
            $model->reviewed_by  = $pr_report['reviewed_by'];
            $model->approved_by  = $pr_report['approved_by'];

            if ($model->save()) {
                $result = true;
            }
            //return $this->redirect(['view', 'id' => $model->pr_id]);
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'result' => $result,
                'model'  => $model,
            ];
        }
    }

    /**
     * Deletes an existing PrReport model.
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

                /*if( $model['pr_type'] == 0 ) {
                    $sql   = "UPDATE pr_item_details SET status=0 WHERE pr_id = $id";
                } else {
                    $sql   = "UPDATE pr_item_sppmp_details SET status=0 WHERE pr_id = $id";
                }

                $query = Yii::$app->getDb()->createCommand($sql);

                if($query->execute()) {
                    $result = true;    
                }*/
                $result = true; 
            } 

            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'result' => $result,
                'model'  => $model,
            ];

        }
    }

    /**
     * Deletes an existing PrReport model.
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
                $result = true; 
            } 

            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'result' => $result,
                'model'  => $model,
            ];

        }
    }

    /**
     * Finds the PrReport model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PrReport the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {

        if (($model = PrReport::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionPrintPr($id) {
        
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model    = $this->findModel($id);
        if ( $model['pr_type'] == 0 ) {
            $pr_items = PrItemDetails::findAll(['pr_id' => $model['pr_id']]);
        } else {
            $pr_items = PrItemSppmpDetails::findAll(['pr_id' => $model['pr_id']]);
        }

        return $this->renderPartial('_print-pr', [
            'model'    => $model,
            'pr_items' => $pr_items,
        ]);
    }

    public function actionPrintSppmp($id) {
        
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model    = $this->findModel($id);
        if ( $model['pr_type'] == 0 ) {
            $pr_items = PrItemDetails::findAll(['pr_id' => $model['pr_id']]);
        } else {
            $pr_items = PrItemSppmpDetails::findAll(['pr_id' => $model['pr_id']]);
        }

        return $this->renderPartial('_print-sppmp', [
            'model'    => $model,
            'pr_items' => $pr_items,
        ]);
    }
}
