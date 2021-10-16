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
        // 'bower_components/bootstrap/dist/css/bootstrap.min.css',
        'bower_components/font-awesome/css/font-awesome.min.css',
        'bower_components/Ionicons/css/ionicons.min.css',
        'dist/css/AdminLTE.min.css',
        'dist/css/skins/skin-blue.min.css',
        'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic',
        'form/upload.css',
        'form/uploadlogo.css',
        'css/jquery.fancybox.css',
    ];
    public $js = [
        // 'bower_components/jquery/dist/jquery.min.js',
        'plugins/input-mask/jquery.inputmask.js',
        'bower_components/bootstrap/dist/js/bootstrap.min.js',
        'dist/js/adminlte.min.js',
        'form/upload.js',
        'form/uploadlogo.js',
        'js/jquery.fancybox.pack.js',
        'js/functions.js',
        'js/adminJS.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
