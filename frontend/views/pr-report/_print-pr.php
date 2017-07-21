<head>
    <title>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</title>
</head>

<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

?>

<style>
    .table {
        border: 1px solid black;
        border-collapse: collapse;
        width: 100%;
        font-size: 9pt;
        font-family: "Calibri";
    }

    #table-footer td{
        border: hidden;
        border-collapse: collapse;
        font-size: 9pt;
        font-family: "Calibri";
    }

    #table-footer {
        margin: 10px;
    }

    tr.td-footer td {
        padding-top: 20px;
    }

    .table th, .table td {
        border: 1px solid black;
        padding: 0px;
    }

    .pr-col-1 {
        width: 80px;
    }

    .pr-col-2 {
        width: 50px;
    }

    .pr-col-4 {
        width: 60px;
    }

    .pr-col-5, .pr-col-6 {
        width: 90px;
    }

    .col-header td {
        border-top: hidden;
        border-left: hidden;
        border-right: hidden;
    }

    .table-pr th {
        text-align: center;
        vertical-align: middle;
    }

    .col-right {
        text-align: right;
    }

    .col-center {
        text-align: center;
    }

    .pr-col-center {
        text-align: center;
    }

    .pr-col-item-center {
        text-align: center;
        font-weight: bold;
    }

    tr.td-item td{
        padding: 3px;
    }

    @page {
        size: A4;
        margin: 10mm 8mm;
    }

    @media print {

        .page {
            margin: 0mm !important;
        }

        .no-print {
            display: none;
        }
    }

    input[name=rb_name],
    input[name=ab_name] {
        width: 100%;
        outline: none;
        border: none;
        text-align: center;
        font-weight: bold;
        background: none repeat scroll 0 0 rgba(0, 0, 0, 0);
    }

    input[name=rb_position],
    input[name=ab_position] {
        width: 100%;
        outline: none;
        border: none;
        text-align: center;
        background: none repeat scroll 0 0 rgba(0, 0, 0, 0);
    }
</style>

<body>

    <div class="no-print">
        <?= Html::button('<i class="fa fa-print"></i>Print', ['onclick' => 'window.print()']) ?>
    </div>

    <div class="page">
        <div class="print-page">
            <table class="table table-pr">
                <thead>
                    <tr class="col-header">
                        <td colspan="6" class="col-right" style="font-size: 15px"><b><i>Appendix 60</i></b></td>
                    </tr>
                    <tr class="col-header">
                        <td colspan="6" class="col-right"><b>Tracking No. :</b> <?= $model->tracker['tracker_no']?></td>
                    </tr>
                    <tr class="col-header">
                        <td colspan="6" class="col-right">&nbsp;</td>
                    </tr>
                    <tr class="col-header">
                        <td colspan="6" class="col-center" style="font-size: 18px"><b>PURCHASE REQUEST (PR) FORM</b></td>
                    </tr>
                    <tr class="col-header">
                        <td colspan="4">Entity Name : <u>DSWD FIELD OFFICE CARAGA</u></td>
                        <td colspan="2">Fund Cluster : </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="border-bottom: hidden"><b>Office/Section</b></td>
                        <td colspan="2"><b>PR No. : </b> <u><?= $model['pr_no'] ?></u></td>
                        <td colspan="2" style="border-bottom: hidden"><b>Date :</b></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="col-center"><u><?= $model->tracker['unit_responsible'] ?></u></td>
                        <td colspan="2"><b>Responsibility Center Code : </b><u><?= $model->tracker['responsibility_code'] ?></td>
                        <td colspan="2" class="col-center"><u><?= date_format(date_create($model['date_created']), "M d, Y") ?></td>
                    </tr>
                    <tr>
                        <th class="pr-col-1">Stock/Property No.</th>
                        <th class="pr-col-2">Unit</th>
                        <th class="pr-col-3">Item Description</th>
                        <th class="pr-col-4">Quantity</th>
                        <th class="pr-col-5">Unit Cost</th>
                        <th class="pr-col-6">Total Cost</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                        $pr_count = 0;
                        $label    = '';

                        foreach ($pr_items as $i => $item) {
                            $id = $i+1;

                            if( !empty($item['item_description']) )
                            {
                                if ( $label != $item['group_label'] ) {

                                    $label = $item['group_label'];

                                    echo 
                                    "<tr class='td-item'>
                                        <td></td>
                                        <td></td>
                                        <td class='pr-col-item-center'>". $item['group_label'] ."</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>";
                                }

                                $pr_count += 1;
                            }

                            echo 
                            "<tr class='td-item'>
                                <td class='col-center'></td>
                                <td class='col-center'>". $item['unit_id'] ."</td>
                                <td class='col-center'>". 
                                    $item['item_description'];
                                    if(!empty($item['add_description'])) echo ' x '.$item['add_description'];
                            echo 
                            "</td>
                                <td class='col-center'>". $item['quantity'] ."</td>
                                <td class='col-right'>". number_format($item['item_price'], 2) ."</td>
                                <td class='col-right'>". number_format($item['total_amount'], 2) ."</td>
                            </tr>";

                            $pr_count += 1;
                        }

                        echo 
                        '<tr class="td-item">
                            <td></td>
                            <td></td>
                            <td style="text-align: center"><b>************* nothing follows *************</b></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>';

                        $blanktd = 30 - $pr_count;

                        while ( $blanktd > 0)
                        {
                            echo 
                            '<tr class="td-item">
                                <td>&nbsp;</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>';

                            $blanktd--;
                        }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="5" class="col-right td-item"><b>TOTAL</b></td>
                        <td class="col-right td-item"><?= number_format($model['total_pr_amount'], 2) ?></td>
                    </tr>
                    <tr>
                        <td style="border-right: hidden;vertical-align: top"><b>Purpose</b></td>
                        <td colspan="6">
                            <?php 
                                echo $model['purpose'];
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <table width="100%" id="table-footer">
                                <tbody>
                                    <tr>
                                        <td width="120px"></td>
                                        <td colspan="2">Requested by/Certified with PPMP:</td>
                                        <td colspan="2">Approved by:</td>
                                    </tr>
                                    <tr class="td-footer">
                                        <td>Signature:</td>
                                        <td></td>
                                        <td class="pr-col-center">___________________________</td>
                                        <td></td>
                                        <td class="pr-col-center">___________________________</td>
                                    </tr>
                                    <tr>
                                        <td>Printed Name:</td>
                                        <td></td>
                                        <td class="pr-col-center">
                                            <b>
                                                <?php 
                                                    if ( $model['pr_type'] == 0 ) {
                                                        $name     = $model->requestedBy;
                                                        $fullname = $name['firstname'].' '.$name['mi'][0].'. '.$name['lastname'];
                                                        echo Html::textInput('rb_name', strtoupper($fullname), ['']);
                                                    } else {
                                                        $name     = $model->reviewedBy;
                                                        $fullname = $name['firstname'].' '.$name['mi'][0].'. '.$name['lastname'];
                                                        echo Html::textInput('rb_name', strtoupper($fullname), ['']);
                                                    }
                                                ?>
                                            </b>
                                        </td>
                                        <td></td>
                                        <td class="pr-col-center">
                                            <b>
                                                <?php 
                                                    $name     = $model->approvedBy;
                                                    $fullname = $name['firstname'].' '.$name['mi'][0].'. '.$name['lastname'];
                                                    echo Html::textInput('ab_name', strtoupper($fullname), ['']);
                                                ?>
                                            </b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Designation:</td>
                                        <td></td>
                                        <td class="pr-col-center">
                                            <?php 
                                                if ( $model['pr_type'] == 0 ) {
                                                    echo Html::textInput('rb_position', $model->requestedBy['position_abr'].'-'.$model->requestedBy['position_desc'], ['']);
                                                } else {
                                                    echo Html::textInput('rb_position', $model->reviewedBy['position_abr'].'-'.$model->reviewedBy['position_desc'], ['']);
                                                }
                                                

                                            ?>
                                        </td>
                                        <td></td>
                                        <td class="pr-col-center">
                                            <?= Html::textInput('ab_position', $model->approvedBy['position_abr'].'-'.$model->approvedBy['position_desc'], ['']) ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</body>