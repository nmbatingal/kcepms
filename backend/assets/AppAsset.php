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
        'css/ionicons/css/ionicons.min.css',
        'css/sweetAlert/sweetalert.css',
    ];
    public $js = [
        'js/js-button-actions.js',
        'js/js-.js',
        'js/js-modal.js',
        'js/slimScroll/jquery.slimscroll.min.js',
        'js/sweetAlert/sweetalert.min.js',
        'js/pace.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
