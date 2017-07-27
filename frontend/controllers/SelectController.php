<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\filters\VerbFilter;

use common\models\LibItemUnit;
use common\models\LibItems;

/**
 * MunicipalityController implements the CRUD actions for Municipality model.
 */
class SelectController extends Controller
{
    /*** UNIT SELECT LIST OPTION ***/
    public function actionUnitOptions()
    {
        $model = LibItemUnit::find()->all();

        if ( !empty($model) ) {
            echo '<option value="">select unit ...</option>';
            foreach ($model as $unit) {
                echo "<option value='".$unit->unit_id."'>".$unit->name."</option>";
            }
        }
    }
    /*** ITEM SELECT LIST OPTION ***/
    public function actionItemOptions()
    {
        $model = LibItems::find()->all();

        if ( !empty($model) ) {
            foreach ($model as $item) {
                echo "<option value='".$item->libSubGeneric['name'].' '.$item->libGeneric['name'].' '.$item->description."'>";
            }
        }
    }
}