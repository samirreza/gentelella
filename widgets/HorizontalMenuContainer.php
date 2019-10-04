<?php

namespace theme\widgets;

use Yii;
use kartik\nav\NavX;
use yii\bootstrap\NavBar;

class HorizontalMenuContainer extends \yii\base\Widget
{
    public $params; // extra parameters from child views.

    public function run()
    {
        $horizontalMenuItems = [];
        if(isset($this->params['horizontalMenuItems'])){
            $horizontalMenuItems = $this->params['horizontalMenuItems'];
        }else if(isset(Yii::$app->controller->module->horizontalMenuItems)){
            $horizontalMenuItems = Yii::$app->controller->module->horizontalMenuItems;
        }

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
