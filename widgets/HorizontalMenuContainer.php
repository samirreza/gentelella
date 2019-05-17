<?php

namespace theme\widgets;

use Yii;
use kartik\nav\NavX;
use yii\bootstrap\NavBar;

class HorizontalMenuContainer extends \yii\base\Widget
{
    public function run()
    {
        $module = Yii::$app->controller->module;
        if (!isset($module->horizontalMenuItems)) {
            return;
        }
        NavBar::begin([
            'options' => [
                'id' => 'horizontal-navbar'
            ]
        ]);
        echo NavX::widget([
            'options' => ['class' => 'navbar-nav '],
            'items' => $module->horizontalMenuItems,
            'activateParents' => true,
            'encodeLabels' => false
        ]);
        NavBar::end();
    }
}
