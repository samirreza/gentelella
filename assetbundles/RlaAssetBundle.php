<?php

namespace theme\assetbundles;

use yii\web\AssetBundle;

class RlaAssetBundle extends AssetBundle
{
    public $sourcePath = '@theme/assets';

    // public $css = [
    // ];

    public $js = [
        'js/rla.js',
    ];

    public $depends = [
        'yii\grid\GridViewAsset',
        'theme\assetbundles\ThemeAssetBundle',
    ];
}
