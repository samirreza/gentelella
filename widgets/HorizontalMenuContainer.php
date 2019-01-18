<?php

namespace theme\widgets;

use Yii;
use yii\helpers\Html;

class HorizontalMenuContainer extends \yii\base\Widget
{
    public function run()
    {
        $module = Yii::$app->controller->module;
        if (!isset($module->horizontalButtons)) {
            return;
        }
        foreach ($module->horizontalButtons as $button) {
            $visibleFor = (empty($button['visibleFor'])) ? null : $button['visibleFor'];
            $visible = isset($button['visible']) ? $button['visible'] : true;
            Html::addCssClass($button['options'], 'horizontal-menu-buttons');
            echo Button::widget([
                'url' => $button['url'],
                'label' => $button['label'],
                'type' => $button['type'] ?? 'primary',
                'icon' => false,
                'visibleFor' => $visibleFor,
                'visible' => $visible,
                'options' => $button['options']
             ]);
        }
    }
}
