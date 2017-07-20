<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PrTracker */
/* @var $form yii\widgets\ActiveForm */
?>

<?php

    $sql = "SELECT code, acronym, acronym AS acr, description FROM libraries.lib_division 
            UNION 
                SELECT b.code, CONCAT(a.acronym,'/', b.acronynm) as acronym, b.acronynm as acr, b.description 
                FROM libraries.lib_division a, libraries.lib_unit b 
                WHERE b.division_id = a.division_id 
            UNION
                SELECT c.code, CONCAT(a.acronym,'/', b.acronynm, '/', c.acronym) as acronym, c.acronym as acr, c.description 
                FROM libraries.lib_division a, libraries.lib_unit b, libraries.lib_section c 
                WHERE c.unit_id = b.unit_id
                AND b.division_id = a.division_id 
            UNION
                SELECT d.code, CONCAT(a.acronym,'/', b.acronynm, '/', c.acronym, '/', d.acronym) as acronym, d.acronym as acr, d.description 
                FROM libraries.lib_division a, libraries.lib_unit b, libraries.lib_section c, libraries.lib_sub_section d
                WHERE d.section_id = c.section_id
                AND c.unit_id = b.unit_id
                AND b.division_id = a.division_id";
    $connection = Yii::$app->getDb();
    $command    = $connection->createCommand($sql);
    $result     = $command->queryAll();

    $model->unit_responsible = $model->responsibility_code.'|'.$model->unit_responsible;
    $model->date_updated     = date("Y-m-d H:i:s");
?>

<div class="pr-tracker-form">

    <?php $form = ActiveForm::begin([
        'id'     => 'frm-update-tracker',
        'action' => Url::toRoute(['update-tracker', 'id' => $model['pr_tracker_id']]),
    ]); ?>

    <?= $form->field($model, 'tracker_year')->hiddenInput()->label(false) ?>
    <?= $form->field($model, 'tracker_month')->hiddenInput()->label(false) ?>
    <?= $form->field($model, 'tracker_seq')->hiddenInput()->label(false) ?>
    <?= $form->field($model, 'proposal_no')->hiddenInput(['maxlength' => true])->label(false) ?>

    <?= $form->field($model, 'tracker_no')->textInput(['maxlength' => true, 'readonly' => 'readonly']) ?>
    <?= $form->field($model, 'tracker_title')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'unit_responsible')
        ->dropDownList(ArrayHelper::map($result, 
                function($model){
                    return $model['code'].'|'.$model['acronym'];
                }, 
                function($model){
                    return $model['acr'] .' - '. $model['description'];
            }), 
            ['prompt' => 'select responsible unit ...']) 
        ->label('Responsible Unit') ?>

    <?= $form->field($model, 'proponent')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'encoder')->hiddenInput()->label(false) ?>
    <?= $form->field($model, 'date_created')->hiddenInput()->label(false) ?>
    <?= $form->field($model, 'date_updated')->hiddenInput()->label(false) ?>
    <?= $form->field($model, 'status')->hiddenInput()->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
