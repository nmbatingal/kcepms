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

        <!-- timeline time label -->
        <li class="time-label">
            <span class="bg-red">
                <?= date("d F Y") ?>
            </span>
        </li>

        <?php
            foreach ($model as $i => $log) {
                
                echo '<li>
                        <i class="fa fa-envelope bg-blue"></i>
                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>
    
                            <h3 class="timeline-header"><a href="#">Support Team</a> ...</h3>
    
                            <div class="timeline-body">
                                ...
                                Content goes here
                            </div>
                        </div>
                    </li>';
            }
        ?>   
        <li>
            <i class="fa fa-clock-o bg-gray"></i>
        </li>

    </ul>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'log_id',
            //'encoder',
            [
                'attribute' => 'encoder',
                'value' => function($model) {
                    $user = User::findIdentity($model['encoder']);

                    return '@'.$user['username'];
                },
            ],
            //'action',
            //'tbl_name',
            //'tbl_col',
            //'tbl_id',
            'details:ntext',
            [
                'attribute' => 'details',
                'value' => function($model) {
                    $tbl_id   = $model['tbl_id'];
                    $tbl_name = $model['tbl_name'];
                    $tbl_col  = $model['tbl_col'];

                    $sql   = "SELECT * FROM $tbl_name WHERE $tbl_col = $tbl_id";
                    $query = Yii::$app->getDb()->createCommand($sql)->queryOne();

                    return $query['tracker_no'];
                },
                'format' => 'raw',
            ],
            'log_date',
            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
