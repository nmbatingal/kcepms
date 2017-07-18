<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Modal;
?>

<style>
    .table-ppmp-items tbody > tr:nth-child(odd){background-color: #f2f2f2;}
    
    .table-ppmp-items th {
        text-align: center;
        vertical-align: middle !important;
    }
    .table-ppmp-items th.col-1,
    .table-ppmp-items td.col-1 {
        width: 3%;
        text-align: center !important;
        vertical-align: middle !important;
    }

    .table-ppmp-items th.col-2,
    .table-ppmp-items th.col-4,
    .table-ppmp-items th.col-5,
    .table-ppmp-items th.col-6,
    .table-ppmp-items th.col-7,
    .table-ppmp-items td.col-2,
    .table-ppmp-items td.col-4,
    .table-ppmp-items td.col-5,
    .table-ppmp-items td.col-6,
    .table-ppmp-items td.col-7 {
        width: 10%;
    }

    .table-ppmp-items th.col-3,
    .table-ppmp-items td.col-3 {
        width: 40%;
    }

    .table-ppmp-items th.col-8,
    .table-ppmp-items td.col-8 {
        width: 4%;
    }

    .table-ppmp-items td.col-2,
    .table-ppmp-items td.col-4 {
        text-align: center !important;
        vertical-align: middle !important;
    }

    .table-ppmp-items td.col-6 {
        text-align: right !important;
        vertical-align: middle !important;
    }

    input[name=total] {
        width: 100%;
        border: none;
        outline: none !important;
        background: none repeat scroll 0 0 rgba(0, 0, 0, 0);
    }
</style>

<?php $this->registerJs('
        $(".box-height").slimScroll({
            size: "8px",
            width: "100%",
            height: "450px",
            allowPageScroll: true, 
            alwaysVisible: false,     
        });
'); ?>

<div class="pr-ppmp-index">

    <div class="box box-solid">
        <div class="box-body bg-gray">
            <div class="col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="fa fa-shopping-cart"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">MODE OF PROCUREMENT</span>
                        <span class="info-box-number"><?= $model->ppmpMode['description'] ?></span>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa fa-ruble"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">BUDGET REMAINING</span>
                        <span class="info-box-number">
                            <?php 
                                $budget = $model['budget'];
                                $deduct = $model['deduction'];

                                if ( !empty($deduct) ) {
                                    $budget = $budget - $deduct;
                                }

                                echo number_format($budget, 2);
                            ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="box box-solid box-default">
        <div class="box-header with-border">
            <h3 class="box-title"><b>Item Overview</b></h3>
        </div>
        <div class="box-body no-padding">
            <div id="item-overview">
            </div>
        </div>
    </div>

    <div class="box box-solid">
        <div class="box-header with-border header-inspinia">
            <h3 class="box-title">Items</h3>
            <span class="pull-right" style="color:#fff"><b>showing <?= count($query) ?> results</b></span>
        </div>
        <div class="box-body no-padding">
            <table class="table table-hover table-ppmp-items">
                <thead>
                    <tr>
                        <th class="col-1">#</th>
                        <th class="col-2">Unit of Measurement</th>
                        <th class="col-3">Item Description</th>
                        <th class="col-4">Remaining</th>
                        <th class="col-5">Quantity</th>
                        <th class="col-6">Item Price</th>
                        <th class="col-7">Total</th>
                        <th class="col-8"></th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="box-body no-padding box-height">
            <table class="table table-hover table-ppmp-items">
                <tbody>
                    <?php
                        $no = 0;
                        foreach ($query as $i => $item) {
                            $no++;
                            echo '
                                <tr class="pr-item-list-'.$i.'">
                                    <td class="col-1">'.$no.'</td>
                                    <td class="col-2">'.
                                        $item['name'].
                                        Html::hiddenInput('unit', $item['name'], ['id' => 'unit-'.$i]).
                                        Html::hiddenInput('ppmp_id', $item['ppmp_id'], ['id' => 'ppmp_id-'.$i]).
                                        Html::hiddenInput('ppmp_item_id', $item['ppmp_item_original_id'], ['id' => 'ppmp_item_id-'.$i]).
                                    '</td>
                                    <td class="col-3">'.
                                        Html::a($item['item_description'], ['ppmp-item-original/per-item', 'id' => $item['ppmp_item_original_id']], ['class' => 'link-ppmp-item']).
                                        Html::hiddenInput('description', $item['item_description'], ['id' => 'description-'.$i]).
                                    '</td>
                                    <td class="col-4">';

                                        if ( $item['remaining'] != NULL ) {
                                            echo Html::textInput('count', $item['remaining'], ['id' => 'count-'.$i, 'style' => 'text-align:center']);
                                        } else {
                                            echo Html::textInput('count', $item['total_count'], ['id' => 'count-'.$i, 'style' => 'text-align:center']);
                                        }

                            echo   '</td>
                                    <td class="col-5">';
                                        if ( $item['remaining'] == NULL ) {

                                            if ( $item['total_count'] != 0 ) {

                                                echo Html::input('number', 'quantity', 0, [
                                                    'min'     => 0, 'step' => 1,
                                                    'max'     => $item['total_count'],
                                                    'id'      => 'quantity-'.$i,
                                                    'class'   => 'form-control',
                                                    'onkeyup' => 'modalQuantity(this)',
                                                ]);

                                            }
                                        } elseif ( $item['remaining'] > 0 ) {
                                            echo Html::input('number', 'quantity', 0, [
                                                    'min'     => 0, 'step' => 1,
                                                    'max'     => $item['remaining'],
                                                    'id'      => 'quantity-'.$i,
                                                    'class'   => 'form-control',
                                                    'onkeyup' => 'modalQuantity(this)',
                                                ]);
                                        }

                            echo    '</td>
                                    <td class="col-6">'.
                                        number_format($item['item_price'], 2).
                                        Html::hiddenInput('price', $item['item_price'], ['id' => 'price-'.$i]).
                                    '</td>
                                    <td class="col-7">'.
                                        Html::input('number', 'total', '0.00', [
                                            'min'   => 0, 'step' => '0.01',
                                            'id'    => 'total-'.$i,
                                            'class' => 'form-control',
                                        ]).
                                    '</td>
                                    <td class="col-8">'.
                                        Html::button('<i class="fa fa-plus"></i>', ['class' => 'btn btn-sm btn-success btn-add-pr-item', 'data-id' => 'btn-row-'.$i]).
                                    '</td>
                                </tr>
                            ';
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>