<?php

namespace theme\assetbundles;

use yii\web\AssetBundle;

class ThemeAssetBundle extends AssetBundle
{
    public $sourcePath = '@theme/assets';

    public $css = [
        'css/gentelella.min.css',
        'css/custom.css',
        'css/sliding-form.css',
        'js/noty/noty.css',
        'js/noty/nest.css',
    ];

    public $js = [
        'js/gentelella.min.js',
        'js/custom.js',
        'js/sliding-form.js',
        'js/noty/noty.min.js'
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapPluginAsset',
        'theme\assetbundles\BootstrapRTLAsset',
        'theme\assetbundles\FontAwesomeRtlAsset'
    ];
}
