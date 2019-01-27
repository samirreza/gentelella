<?php

namespace theme\widgets;

use Yii;
use yii\widgets\Menu;

class HorizontalMenu extends \yii\base\Widget
{
    public function run()
    {
        $module = Yii::$app->controller->module;
        $parentModule = Yii::$app->controller->module->module;
        $buttons = array_merge(
            $module->horizontalMenuItems ?? [],
            $parentModule->horizontalMenuItems ?? []
        );
        $buttons[] = [
            'label' => 'خروج',
            'url' => ['/user/auth/logout']
        ];
        if (empty($buttons)) {
            return;
        }
        echo Menu::widget([
            'items' => $buttons,
            'activateParents' => true,
            'options' => [
                'class' => 'nav navbar-nav horizontal-menu'
            ],
            'submenuTemplate' => "\n<ul class='dropdown-menu dropdown-menu-right' role='menu'>\n{items}\n</ul>\n",
            'labelTemplate' => '<a class="dropdown-toggle" data-toggle="dropdown" href="#">{label}<span class="caret"></span></a>'
        ]);
    }
}
