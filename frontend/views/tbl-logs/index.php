<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;

use common\models\User;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TblLogsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Activity Logs';
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
    .bg-white {
        background-color: #fff !important;
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
                $temp_date  = date("d F Y", strtotime($log['log_date']));
                $controller = $log['tbl_name'];
                $action_id  = $log['action'];
                $action     = '';
                $_id        = '';

                /*** ICONS DEPENDING ON USER ACTION ***/
                if ( $action_id == 0 ) {                // create
                    $class = 'fa fa-plus bg-green';
                    if ( $controller == 'pr_tracker' ) {
                        $action = Url::toRoute(['pr-tracker/view', 'id' => $log['tbl_id']]);
                    } elseif ( $controller == 'pr_report' ) {
                        $action = Url::toRoute(['pr-report/view', 'id' => $log['tbl_id']]);
                    }
                } elseif ( $action_id == 1 ) {          // update
                    $class = 'fa fa-pencil bg-blue';
                    if ( $controller == 'pr_tracker' ) {
                        $action = Url::toRoute(['pr-tracker/view', 'id' => $log['tbl_id']]);
                    }
                } elseif ( $action_id == 2 ) {          // delete
                    $class = 'fa fa-remove bg-red';
                } elseif ( $action_id == 3 ) {          // restore
                    $class = 'fa fa-history bg-green';
                    if ( $controller == 'pr_tracker' ) {
                        $action = Url::toRoute(['pr-tracker/view', 'id' => $log['tbl_id']]);
                    }
                } elseif ( $action_id == 4 ) {          // login-logout
                    $class = 'fa fa-user-circle-o bg-white';
                }

                $split = explode('##', $log['details']);
                $no    = Html::a((!empty($split[1]) ? $split[1] : $split[0]), $action, ['class' => 'text-red']);

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
                                    <span class="time"><i class="fa fa-clock-o"></i> '.date("F d, Y H:i a", strtotime($log['log_date'])).'</span>
            
                                    <h3 class="timeline-header"><a href="#">@'.User::findIdentity($log['encoder'])->username.'</a> '.$split[0].$no.$split[2].'</h3>
                                </div>
                            </li>';
                    } else {
                        echo '<li>
                                <i class="'.$class.'"></i>
                                <div class="timeline-item">
                                    <span class="time"><i class="fa fa-clock-o"></i> '.date("F d, Y H:i a", strtotime($log['log_date'])).'</span>
            
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
