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
        border: 1px solid #000;
        border-collapse: collapse;
        width: 100%;
    }

    .table th, .table td{
        border: 1px solid #000;
        border-collapse: collapse;
        font-size: 8pt;
        font-family: "Calibri";
    }

    .table-head {
        border: none !important;
    }

    .table-head th, .table-head td {
        border: none !important;
        padding: 0;
        font-size: 10pt;
        font-weight: bold; 
    }

    .table-sppmp tbody td {
        padding: 2px;
    }

    .table-sppmp thead th {
        background: #e4e4e4;
    }

    .table-sppmp tfoot td {
        border: none;
        padding: 3px;
        text-align: right;
        font-size: 8pt;
        font-weight: bold;
        background: #e4e4e4;
    }

    .col-center {
        text-align: center !important;
    }

    .col-1 { 
        width: 30%;
    }

    .label { 
        background: #ffee73;
        font-weight: bold; 
    }

    .col-2 {
        width: 3%;
        text-align: center;
    }

    .col-3, .col-4, .col-5, .col-6, .col-7,
    .col-8, .col-9, .col-10, .col-11, .col-12,
    .col-13, .col-14 {
        width: 3%;
        text-align: right;
    }

    .col-15 {
        width: 4%;
        text-align: center;
        background: #e4e4e4;
    }

    .col-16 {
        width: 5%;
        text-align: right;
    }

    .col-17 {
        width: 5%;
        text-align: right;
        background: #e4e4e4;
    }

    .table-assignatory {
        border: none;
        width: 100%;
        table-layout: fixed;
        border-spacing: 30px 0;
        border-collapse: separate;
    }

    .table-pr-mode {
        border: none;
        width: 100%;
        margin-top: 20px;
        table-layout: fixed;
        border-collapse: collapse;
    }
    .table-pr-mode td {
        font-size: 8pt;
        font-family: "Calibri";
        text-align: center;
        font-size: 8pt;
        font-weight: bold;
    }

     .col-mode {
        border: 1px solid #000;
        padding: 3px;
        background: #e4e4e4;
     }

    .table-assignatory th, .table-assignatory td{
        border: 1px solid #000;
        width: 100%;
        font-size: 7pt;
        font-family: "Calibri";
    }

    .table-assignatory tr.col-label-assig td {
        padding-bottom: 40px;
        border: none;
    }

    .table-assignatory tr.col-assig-name td {
        border: none;
        border-bottom: 1px solid #000;
        text-align: center;
        font-weight: bold;
    }

    .table-assignatory tr.col-assig-pos td {
        border: none;
        text-align: center;
    }

    div#page-body {
        margin-top: 20px;
    }

    div#page-footer {
        margin-top: 30px;
    }

    /*.page {
        margin: 15mm;
    }*/

    tr.col-assig-name input {
        width: 100%;
        border: none;
        text-align: center;
        font-size: 7pt;
        font-weight: bold;
    }

    tr.col-assig-pos input {
        width: 100%;
        border: none;
        text-align: center;
        font-size: 7pt;
    }

    @page {
        size: A4 landscape;
        margin: 10mm;
    }

    @media print {

        html, body {
            margin: 0mm !important;
            font-size: 8pt;
            font-family: "Calibri";
        }

        .page {
            margin: 1mm !important;
        }

        .print-page {
            margin-left: 1mm !important;
            margin-right: 1mm !important;
        }

        .table {
            font-size: 8pt;
        }

        .table-items {
            page-break-inside: auto;
        }

        #body-items {
            margin-top: 5mm;
        }

        #footer {
            bottom: 0;
            page-break-inside: avoid;
            page-break-before: auto;
        }

        .no-print {
            display: none;
        }
    }
</style>

<?php
    $date_now = date_format(date_create(date('Y-m-d')), 'M d, Y');
?>

<body>
    <div class="no-print">
        <?= Html::button('<i class="fa fa-print"></i>Print', ['onclick' => 'window.print()']) ?>
    </div>

    <div class="page">
        <div class="print-page">
            <div id="page-header">
                <table class="table table-head">
                    <thead>
                        <tr>
                            <td>SUPPLEMENTAL PROJECT PROCUREMENT MANAGEMENT PLAN FOR <?= date("Y")?></td>
                            <td style="text-align: right">Tracking No: <span style="font-weight: normal;"><?= $model->tracker['tracker_no']?></span></td>
                        </tr>
                        <tr>
                            <td>KC-NCDDP</td>
                        </tr>
                    </thead>
                </table>
            </div>

            <div id="page-body">
                <table class="table table-sppmp">
                    <thead>
                        <tr>
                            <th rowspan="2">Item &amp; Specifications</td>
                            <th rowspan="2">Unit of Measure</td>
                            <th colspan="13">Quantity Requirement</td>
                            <th rowspan="2">** PS Price Catalogue as of (<u><i>06.30.2017</i></u>)</td>
                            <th rowspan="2">Total Amount</td>
                        </tr>
                        <tr>
                            <th>Jan</td>
                            <th>Feb</td>
                            <th>Mar</td>
                            <th>Apr</td>
                            <th>May</td>
                            <th>Jun</td>
                            <th>Jul</td>
                            <th>Aug</td>
                            <th>Sep</td>
                            <th>Oct</td>
                            <th>Nov</td>
                            <th>Dec</td>
                            <th>Total</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                            $pr_count      = 0;
                            $total_request = 0;
                            $label         = '';
                            foreach ($pr_items as $i => $sppmp) {
                                $total_request += $sppmp['total_amount'];

                                if(!empty($sppmp['group_label'])) {
                                    if($label !== $sppmp['group_label']) {
                                        $label = $sppmp['group_label'];
                                        echo '
                                            <tr>
                                                <td class="col-1 label col-center">'.$sppmp['group_label'].'</td>
                                                <td class="col-2"></td>
                                                <td class="col-3"></td>
                                                <td class="col-4"></td>
                                                <td class="col-5"></td>
                                                <td class="col-6"></td>
                                                <td class="col-7"></td>
                                                <td class="col-8"></td>
                                                <td class="col-9"></td>
                                                <td class="col-10"></td>
                                                <td class="col-11"></td>
                                                <td class="col-12"></td>
                                                <td class="col-13"></td>
                                                <td class="col-14"></td>
                                                <td></td>
                                                <td class="col-16"></td>
                                                <td></td>
                                            </tr>
                                        ';
                                    }
                                }

                                echo '
                                    <tr>
                                        <td class="col-1 col-center">'.
                                            $sppmp['item_description'];
                                            if(!empty($sppmp['add_description'])) echo ' x '.$sppmp['add_description'];
                                echo   '</td>
                                        <td class="col-2">'.$sppmp['unit_id'].'</td>
                                        <td class="col-3">'.$sppmp['january'].'</td>
                                        <td class="col-4">'.$sppmp['february'].'</td>
                                        <td class="col-5">'.$sppmp['march'].'</td>
                                        <td class="col-6">'.$sppmp['april'].'</td>
                                        <td class="col-7">'.$sppmp['may'].'</td>
                                        <td class="col-8">'.$sppmp['june'].'</td>
                                        <td class="col-9">'.$sppmp['july'].'</td>
                                        <td class="col-10">'.$sppmp['august'].'</td>
                                        <td class="col-11">'.$sppmp['september'].'</td>
                                        <td class="col-12">'.$sppmp['october'].'</td>
                                        <td class="col-13">'.$sppmp['november'].'</td>
                                        <td class="col-14">'.$sppmp['december'].'</td>
                                        <td class="col-15">'.$sppmp['quantity'].'</td>
                                        <td class="col-16">'.number_format($sppmp['item_price'], 2).'</td>
                                        <td class="col-17">'.number_format($sppmp['total_amount'], 2).'</td>
                                    </tr>
                                ';
                                $pr_count += 1;
                            }
                            echo '
                                <td class="col-center"><b>************* nothing follows *************<b></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="col-15"></td>
                                <td></td>
                                <td class="col-17"></td>
                            ';

                            /*** BLANK CELL ROWS ***/
                            $rows = 16 - $pr_count;
                            while ( $rows > 0)
                            {
                                echo 
                                '<tr class="td-item">
                                    <td>&nbsp;</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="col-15"></td>
                                    <td></td>
                                    <td class="col-17"></td>
                                </tr>';

                                $rows--;
                            }
                        ?>
                    </tbody>

                    <tfoot>
                        <tr>
                            <td colspan="15">Grand Total</td>
                            <td class="col-center">:</td>
                            <td><?= number_format($total_request, 2)?></td>
                        </tr>
                    </tfoot>
                </table>

                <table class="table-pr-mode">
                    <tr>
                        <td>&nbsp;</td>
                        <td></td>
                        <td></td>
                        <td class="col-mode">Mode of Procurement</td>
                        <td class="col-mode"><?= $model->ppmpMode['description'] ?></td>
                    </tr>
                </table>
            </div>

            <div id="page-footer">
                <table class="table-assignatory">
                    <tbody>
                        <tr class="col-label-assig">
                            <td>Prepared by:</td>
                            <td>Noted by:</td>
                            <td>Reviewed by:</td>
                            <td>Approved by:</td>
                        </tr>
                        <tr class="col-assig-name">
                            <td>
                                <?php 
                                    $name     = $model->preparedBy;
                                    $fullname = $name['firstname'].' '.$name['mi'][0].'. '.$name['lastname'];
                                    echo Html::textInput('pb_name', strtoupper($fullname), ['']);
                                ?>
                            </td>
                            <td>
                                <?php 
                                    $name     = $model->notedBy;
                                    $fullname = $name['firstname'].' '.$name['mi'][0].'. '.$name['lastname'];
                                    echo Html::textInput('nb_name', strtoupper($fullname), ['']);
                                ?>
                            </td>
                            <td>
                                <?php 
                                    $name     = $model->reviewedBy;
                                    $fullname = $name['firstname'].' '.$name['mi'][0].'. '.$name['lastname'];
                                    echo Html::textInput('rb_name', strtoupper($fullname), ['']);
                                ?>
                            </td>
                            <td>
                                <?php 
                                    $name     = $model->approvedBy;
                                    $fullname = $name['firstname'].' '.$name['mi'][0].'. '.$name['lastname'];
                                    echo Html::textInput('ab_name', strtoupper($fullname), ['']);
                                ?>
                            </td>
                        </tr>
                        <tr class="col-assig-pos">
                            <td>
                                <?= Html::textInput('rb_position', $model->preparedBy['position_abr'].' / Procurement', ['']) ?>
                            </td>
                            <td>
                                <?= Html::textInput('rb_position', $model->notedBy['position_desc'], ['']) ?>
                            </td>
                            <td>
                                <?= Html::textInput('rb_position', $model->reviewedBy['position_abr'].' / RPC', ['']) ?>
                            </td>
                            <td>
                                <?= Html::textInput('rb_position', $model->approvedBy['position_abr'].' / RPM', ['']) ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>