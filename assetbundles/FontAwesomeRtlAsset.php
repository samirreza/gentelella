<?php

namespace theme\assetbundles;

use yii\web\AssetBundle;

class FontAwesomeRtlAsset extends AssetBundle
{
    public $sourcePath = '@theme/assets';

    public $css = [
        'css/font-awesome-rtl.css'
    ];

    public $depends = [
        'theme\assetbundles\FontAwesomeAsset'
    ];
}
