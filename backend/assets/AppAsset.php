<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        //'css/fountain.css',
        //'css/pace.css',
        'css/ionicons/css/ionicons.min.css',
    ];
    public $js = [
        'js/vue.js',
        'js/highcharts/code/highcharts.js',
        // 'js/dashboard_vue.js',
        //'js/vue_components/procurement_charts.js',

        'js/js-button-actions.js',
        'js/js-modal.js',
        'js/slimScroll/jquery.slimscroll.min.js',
        //'js/pace.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
