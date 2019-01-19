<?php

namespace theme\widgets;

use Yii;
use yii\widgets\Menu;

class HorizontalMenuContainer extends \yii\base\Widget
{
    public function run()
    {
        $module = Yii::$app->controller->module;
        $parentModule = Yii::$app->controller->module->module;
        $buttons = array_merge(
            $module->horizontalButtons ?? [],
            $parentModule->horizontalButtons ?? []
        );
        if (empty($buttons)) {
            return;
        }
        echo Menu::widget([
            'items' => $buttons,
            'options' => [
                'class' => 'nav navbar-nav'
            ],
            'submenuTemplate' => "\n<ul class='dropdown-menu'>\n{items}\n</ul>\n",
            'labelTemplate' => '<a class="dropdown-toggle" data-toggle="dropdown" href="#">{label}<span class="caret"></span></a>'
        ]);
    }
}
