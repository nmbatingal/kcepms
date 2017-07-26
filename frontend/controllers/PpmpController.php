<?php

namespace frontend\controllers;

use Yii;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\filters\VerbFilter;

use common\models\Ppmp;
use frontend\models\PpmpSearch;
use common\models\PpmpCategory;
use common\models\PpmpItemOriginal;
use common\models\LibItems;
use frontend\models\LibItemsSearch;

/**
 * PpmpController implements the CRUD actions for Ppmp model.
 */
class PpmpController extends Controller
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
     * Lists all Ppmp models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $searchModel = new PpmpSearch();
        $searchModel->ppmp_unit_id  = 1;
        $searchModel->year          = 2017;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if ( Yii::$app->request->isAjax ) {

            $html = $this->renderAjax('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);

            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'html' => $html,
                'url'  => Url::toRoute(['index']),
                'title' => 'PPMP',
            ];

        } else {
            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
    }

    /**
     * Displays a single Ppmp model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Ppmp model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() 
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new Ppmp();

        if ( Yii::$app->request->isAjax ) {
            $html = $this->renderAjax('create', [
                'model' => $model,
            ]);

            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'html' => $html,
                'title' => 'PPMP',
                'url'  => Url::toRoute(['create']),
            ];
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionCreatePpmp()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $result     = false;
        $ppmpData   = Yii::$app->request->post('Ppmp');

        if ($ppmpData) {

            foreach ($ppmpData['ppmp_category_id'] as $i => $ppmp) {

                $model  = new Ppmp();
                $budget = $ppmpData['budget'][$i];

                if( $budget == 0 ) {
                    $budget = NULL;
                }

                $model->ppmp_unit_id        = $ppmpData['ppmp_unit_id'];
                $model->ppmp_category_id    = $ppmp;
                $model->size_quantity       = $ppmpData['size_quantity'][$i];
                $model->budget              = $budget;
                $model->deduction           = NULL;
                $model->ppmp_mode_id        = $ppmpData['ppmp_mode_id'][$i];
                $model->year                = $ppmpData['year'];
                $model->date_created        = $ppmpData['date_created'];
                $model->encoder             = $ppmpData['encoder'];
                $model->status              = $ppmpData['status'];

                if ( $model->save() ) {
                    $result = true;
                }
            }

            return $this->redirect(['index']);
        }
    }

    /**
     * Updates an existing Ppmp model.
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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ppmp_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Ppmp model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Ppmp model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Ppmp the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        if (($model = Ppmp::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionPpmpList()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $itemType   = isset($_POST['itemType']) ? $_POST['itemType'] : '';
        $program    = isset($_POST['program']) ? $_POST['program'] : '';
        $date       = isset($_POST['date']) ? $_POST['date'] : '';
        $ppmp       = [];
        $result     = false;

        switch ( $itemType ) {
            case 1:
                $ppmpCategory = Ppmp::find()
                    ->andWhere(['ppmp_unit_id' => $program])
                    ->andWhere(['not in', 'ppmp_category_id', array('8','11','12')])
                    ->andWhere(['!=', 'budget', '0'])
                    ->andWhere(['year' => $date])
                    ->all();
                break;
            case 2:
                $ppmpCategory = Ppmp::find()
                    ->andWhere(['ppmp_unit_id' => $program])
                    ->andWhere(['in', 'ppmp_category_id', array('8','10')])
                    ->andWhere(['!=', 'budget', '0'])
                    ->andWhere(['year' => $date])
                    ->all();
                break;
            default:
                $ppmpCategory = Ppmp::find()
                    ->andWhere(['ppmp_unit_id' => $program])
                    ->andWhere(['in', 'ppmp_category_id', array('10', '11', '12')])
                    ->andWhere(['!=', 'budget', '0'])
                    ->andWhere(['year' => $date])
                    ->all();
                break;
        }

        if($ppmpCategory)
        {
            $ppmp[] = "<option>select ppmp</option>"; 
            foreach ($ppmpCategory as $categories) {
                $ppmp[] = "<option value='".$categories['ppmp_id']."'>".$categories->ppmpCategory['description'] ."</option>";
            }
            $result = true;
        }

        Yii::$app->response->format = Response::FORMAT_JSON;
        return [
            'ppmp'   => $ppmp,
            'result' => $result,
        ];
    }

    public function actionPpmpListItems()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        
        $ppmp_id    = isset($_POST['ppmp_id']) ? $_POST['ppmp_id'] : '';

        /*$connection = Yii::$app->getDb();
        $command = $connection->createCommand("
            SELECT o.*
             , (o.total_count - (SELECT SUM(d.total_count) AS total_count FROM ppmp_item_deduction d WHERE d.ppmp_item_original_id = o.ppmp_item_original_id)) AS remaining
             , i.name
            FROM ppmp_item_original o
            LEFT JOIN lib_item_unit i
                ON i.unit_id = o.unit_id
            WHERE o.ppmp_id = $ppmp_id");

        $result = $command->queryAll();*/

        $searchModel = new LibItemsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $lib_items = LibItems::find()->all();
        $model     = Ppmp::findOne(['ppmp_id' => $ppmp_id]);

        if (!empty($lib_items)) {

            Yii::$app->response->format = Response::FORMAT_JSON;
            return $this->renderAjax('_pr-ppmp', [
                'query' => $lib_items,
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'model' => $model,
            ]);

        } else {
            return '';
        }
    }

    public function actionLoadLibSearch()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $searchModel = new LibItemsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->get());
        
        if(isset($_GET['page']) && isset($_GET['per-page'])) {
            $dataProvider->pagination->page     = $_GET['page'];
            $dataProvider->pagination->pageSize = $_GET['per-page'];
        }

        return $this->renderAjax('_load-pr-ppmp', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}
