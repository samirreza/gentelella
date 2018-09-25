<?php

namespace theme\widgets\jalalidatepicker;

use yii\web\AssetBundle;

class DatePickerAsset extends AssetBundle
{
    public $sourcePath = '@theme/widgets/jalalidatepicker/assets';
    public $js = [
        'js/bootstrap-datepicker.min.js',
        'js/bootstrap-datepicker.fa.min.js'
    ];
    public $css = [
         'css/bootstrap-datepicker.min.css',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
        'themes\admin360\assetbundles\BootstrapRTLAsset',
    ];
}
