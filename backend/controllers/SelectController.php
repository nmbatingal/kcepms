<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\filters\VerbFilter;

use common\models\PpmpCategory;
use common\models\PpmpMode;

/**
 * MunicipalityController implements the CRUD actions for Municipality model.
 */
class SelectController extends Controller
{

    /*** PPMP CATEGORY SELECT LIST OPTION ***/
    public function actionPpmpCategoryOptions()
    {
        $model = PpmpCategory::find()->all();

        if ( !empty($model) ) {
            echo '<option value="">select ppmp category ...</option>';
            foreach ($model as $category) {
                echo "<option value='".$category->ppmp_category_id."'>".$category->description."</option>";
            }
        }
    }

    /*** MODE OF PROCUREMENT SELECT LIST OPTION ***/
    public function actionPrModeOptions()
    {
        $model = PpmpMode::find()->all();

        if ( !empty($model) ) {
            echo '<option value="">select mode of procurement ...</option>';
            foreach ($model as $pr_mode) {
                echo "<option value='".$pr_mode->ppmp_mode_id."'>".$pr_mode->mode."</option>";
            }
        }
    }
}
