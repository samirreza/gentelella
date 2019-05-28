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
        $horizontalMenuItems = array_merge(
            [
                [
                    'label' => 'خروج',
                    'url' => ['/user/auth/logout']
                ],
            ],
            $module->horizontalMenuItems ?? []
        );
        NavBar::begin([
            'options' => [
                'id' => 'horizontal-navbar'
            ]
        ]);
        echo NavX::widget([
            'options' => ['class' => 'navbar-nav '],
            'items' => $horizontalMenuItems,
            'activateParents' => true,
            'encodeLabels' => false
        ]);
        NavBar::end();
    }
}
