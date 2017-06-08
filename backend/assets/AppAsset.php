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
        'css/jquery-ui.min.css',
        'css/jquery.bracket.min.css',
        'css/main.css',
        //'css/home.css',
        //'css/home-video.css',
    ];
    public $js = [
        //'js/home.js',
        //'js/froogaloop2.min.js',
        'js/jquery-ui-1.8.16.custom.min.js',
        'js/jquery.bracket.min.js',
        'js/jquery-ui-1.8.16.custom.min.js',
        'js/jquery.json-2.3.min.js',
        'js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
