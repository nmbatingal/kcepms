<?php

use yii\helpers\Html;
use yii\grid\GridView;

use common\models\User;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TblLogsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbl Logs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-logs-index content-body">

    <ul class="timeline">

        <li class="time-label">
            <span class="bg-blue">
                <?= date("d F Y") ?>
            </span>
        </li>

        <?php
            $date = date("d F Y");
            foreach ($model as $i => $log) {
                $temp_date = date("d F Y", strtotime($log['log_date']));

                $action_id = $log['action'];
                /*** ICONS DEPENDING ON USER ACTION ***/
                switch ($action_id) {
                    case 0:
                        $class = 'fa fa-plus bg-green';
                        break;
                    case 1:
                        $class = 'fa fa-pencil bg-blue';
                        break;
                    case 2:
                        $class = 'fa fa-remove bg-red';
                        break;
                    case 3:
                        $class = 'fa fa-trash bg-green';
                        break;
                }

                $split = explode('##', $log['details']);
                $no    = '<a href="#" class="text-red">'. (!empty($split[1]) ? $split[1] : $split[0]) .'</a>';

                if ( $date != $temp_date ) {
                    $date = $temp_date;

                    echo '<li class="time-label">
                            <span class="bg-blue">'.
                                $date.    
                            '</span>
                        </li>';
                }
                    if ( count($split) > 1 ) {
                        echo '<li>
                                <i class="'.$class.'"></i>
                                <div class="timeline-item">
                                    <span class="time"><i class="fa fa-clock-o"></i> '.date("F d, Y H:i", strtotime($log['log_date'])).'</span>
            
                                    <h3 class="timeline-header"><a href="#">@'.User::findIdentity($log['encoder'])->username.'</a> '.$split[0].$no.$split[2].'</h3>
                                </div>
                            </li>';
                    } else {
                        echo '<li>
                                <i class="'.$class.'"></i>
                                <div class="timeline-item">
                                    <span class="time"><i class="fa fa-clock-o"></i> '.date("F d, Y H:i", strtotime($log['log_date'])).'</span>
            
                                    <h3 class="timeline-header"><a href="#">@'.User::findIdentity($log['encoder'])->username.'</a> '.$log['details'].'</h3>
                                </div>
                            </li>';
                    }
            }
        ?>
        <li>
            <i class="fa fa-clock-o bg-gray"></i>
        </li>

    </ul>
</div>
