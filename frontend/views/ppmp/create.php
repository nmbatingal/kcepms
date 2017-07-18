<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\Breadcrumbs;

use common\models\PpmpUnit;
use common\models\PpmpMode;
use common\models\PpmpCategory;

/* @var $this yii\web\View */
/* @var $model common\models\Ppmp */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Create PPMP';
$this->params['breadcrumbs'][] = ['label' => 'PPMP', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Create';
?>

<?php
    $model->ppmp_unit_id = 1;
    $model->year         = date("Y");
    $model->date_created = date("Y-m-d H:i:s");
    $model->encoder      = Yii::$app->user->identity->id;
    $model->status       = 1;
    $model->ppmp_category_id     = 1;
?>

<style>

	.table {
		border: none;
		margin: 0 !important;
		width: 100%;
	}  

    .table th {
        border: none;
        padding: 0 !important;
    }

    .table td {
        border-bottom: 2px solid #f4f4f4;
        padding: 0 !important;
    }	

	.table th {
        padding: 10px !important;
        text-align: center;
		vertical-align: middle;
	}

    td.col-5 {
        width: 10px !important;
        padding: 10px !important;
    }

    select.borderless {
        width: 100%;
        padding: 5px;
        border: none !important;
        outline: none;
        background: none repeat scroll 0 0 rgba(0, 0, 0, 0);
    }

    input.borderless {
        width: 100%;
        padding: 4px;
        border: none !important;
        transition: border 0.3s !important;
        outline: none !important;
        background: none repeat scroll 0 0 rgba(0, 0, 0, 0);
    }

    input[type=number] {
        text-align: right;
    }

    input[type=number]::-webkit-inner-spin-button, 
    input[type=number]::-webkit-outer-spin-button,
    input[type=number]::-moz-inner-spin-button, 
    input[type=number]::-moz-outer-spin-button { 
        -webkit-appearance: none; 
        -moz-appearance: none; 
    }

    div.help-block {
        padding-left: 10px;
    }
</style>

<section class="content-header page-heading white-bg">
    <?php if (isset($this->blocks['content-header'])) { ?>
        <h1><?= $this->blocks['content-header'] ?></h1>
    <?php } else { ?>
        <h1>
            <?php
            if ($this->title !== null) {
                echo \yii\helpers\Html::encode($this->title);
            } else {
                echo \yii\helpers\Inflector::camel2words(
                    \yii\helpers\Inflector::id2camel($this->context->module->id)
                );
                echo ($this->context->module->id !== \Yii::$app->id) ? '<small>Module</small>' : '';
            } ?>
        </h1>
    <?php } ?>

    <?= Breadcrumbs::widget(
        [
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]
    ) ?>
</section>

<div class="ppmp-create content-body">

    <?php $form = ActiveForm::begin([
        'id'    => 'frm-pr-tracker',
        'fieldConfig' => [
            'template'  => '{input}{error}',
        ],
        'action'=> Url::toRoute(['create-ppmp']),
    ]); ?>

        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-5">
                        <?= Html::label('Program / Unit') ?>
                        <?= $form->field($model, 'ppmp_unit_id')
                            ->dropDownList(ArrayHelper::map(PpmpUnit::find()->all(), 'ppmp_unit_id', 'unit_description'), [
                                'placeholder' => 'select program / unit']) 
                        ?>
                    </div>

                    <div class="col-md-3">
                        <?= Html::label('Year') ?>
                        <?= $form->field($model, 'year')->textInput() ?>
                    </div>
                </div>

                <div class="hidden">
                    <?= $form->field($model, 'date_created')->textInput() ?>
                    <?= $form->field($model, 'encoder')->textInput() ?>
                    <?= $form->field($model, 'status')->textInput() ?>
                </div>
            </div>
        </div>

        <div class="box box-solid">
            <div class="box-header with-border header-inspinia">
                <h3 class="box-title">PPMP CATEGORY</h3>
            </div>

            <div class="box-footer no-padding">
            	<table class="table table-hover table-scroll">
            		<thead>
            			<tr>
            				<th>PPMP</th>
            				<th>Quantity/Size</th>
            				<th>Budget</th>
            				<th>Mode of Procurement</th>
            				<th><?= Html::button('<i class="glyphicon glyphicon-plus"></i>', ['id' => 'btn-add-cat-ppmp', 'class' => 'btn btn-sm btn-flat btn-success']) ?></th>
            			</tr>
            		</thead>
            		<tbody id="ppmp-category">
                        <?php
                            for ( $i=0 ; $i<12 ; $i++ ) { 
                                echo '
                                <tr class="ppmp-category-row">
                                    <td class="col-1">'.
                                        $form->field($model, 'ppmp_category_id['.$i.']')
                                            ->dropDownList(ArrayHelper::map(PpmpCategory::find()->all(), 'ppmp_category_id', 'description'), [
                                                'class' => 'form-control borderless',
                                                'value' => $i + 1,
                                                'prompt'    => 'select ppmp category ...']) . 
                                    '</td>
                                    <td class="col-2">'.
                                        $form->field($model, 'size_quantity['.$i.']')
                                            ->input('number', [
                                                'class' => 'form-control borderless',
                                                'placeholder' => 0,
                                                'step' => '0.01',
                                                'min' => '0']) .
                                    '</td>
                                    <td class="col-3">'.
                                        $form->field($model, 'budget['.$i.']')
                                            ->input('number',[
                                                'class' => 'form-control borderless',
                                                'placeholder'=>'0.00',
                                                'step'=>'0.01',
                                                'min'=>'0']) . 

                                        $form->field($model, 'deduction['.$i.']')->hiddenInput(['value' => 0]) .
                                    '</td>
                                    <td class="col-4">'.
                                        $form->field($model, 'ppmp_mode_id['.$i.']')
                                            ->dropDownList(ArrayHelper::map(PpmpMode::find()->all(), 'ppmp_mode_id', 'mode'), [
                                                'class' => 'form-control borderless',
                                                'value' => NULL,
                                                'prompt'    => 'select mode of procurement ...']) .
                                    '</td>
                                    <td class="col-5">'.
                                        Html::button('<i class="glyphicon glyphicon-remove"></i>', ['class' => 'btn btn-sm btn-flat btn-danger btn-remove-cat-ppmp']) .
                                    '</td>
                                </tr>
                                ';
                            }
                        ?>
            		</tbody>
            	</table>
            </div>
        </div>

        <div class="form-group pull-right">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

    <?php ActiveForm::end(); ?>

</div>
