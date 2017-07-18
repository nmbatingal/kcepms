<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AdminLtePluginAsset extends AssetBundle
{
    public $sourcePath = '@vendor/almasaeed2010/adminlte';
    public $js = [
        //'plugins/datatables/dataTables.bootstrap.min.js',
        //'plugins/slimScroll/jquery.slimscroll.min.js',
    ];
    public $css = [
        //'bootstrap/css/bootstrap.css',
        'bootstrap/css/bootstrap.min.css',
        //'plugins/font-awesome/css/font-awesome.min.css',
        //'plugins/ionicons/css/ionicons.min.css',
        'dist/css/AdminLTE.min.css',
        'dist/css/skins/_all-skins.min.css',
        'plugins/datatables/dataTables.bootstrap.css',
        'plugins/iCheck/flat/blue.css',
        //'plugins/morris/morris.css',
        //'plugins/jvectormap/jquery-jvectormap-1.2.2.css',
        //'plugins/datepicker/datepicker3.css',
        //'plugins/daterangepicker/daterangepicker-bs3.css',
        'plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css',
    ];
    public $depends = [
        'dmstr\web\AdminLteAsset',
    ];
}
