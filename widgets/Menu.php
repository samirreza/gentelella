<?php

namespace theme\widgets;

use Yii;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

class Menu extends \yii\widgets\Menu
{
    public $labelTemplate = '{label}';

    public $linkTemplate = '<a href="{url}">{icon}<span>{label}</span>{badge}</a>';

    public $submenuTemplate = "\n<ul class=\"nav child_menu\">\n{items}\n</ul>\n";

    public $iconTemplate = '<i class="fa fa-{icon}"></i>';

    public $activateParents = true;

    public function init()
    {
        Html::addCssClass($this->options, 'nav side-menu');
        parent::init();
    }

    public function run()
    {
        $this->items = $this->getMenuItems();
        parent::run();
    }

    protected function renderItem($item)
    {
        $iconTemplate = $this->setIconTemplate($item);
        if (empty($item['url'])) {
            $iconTemplate .= '<span class="fa fa-chevron-down"></span>';
        }
        if (empty($item['url'])) {
            $item['url'] = 'javascript:void(0)';
        }
        $renderedItem = parent::renderItem($item);
        if (isset($item['badge'])) {
            $badgeOptions = ArrayHelper::getValue($item, 'badgeOptions', []);
            Html::addCssClass($badgeOptions, 'label pull-left');
        } else {
            $badgeOptions = null;
        }
        return strtr(
            $renderedItem,
            [
                '{icon}' => $iconTemplate,
                '{badge}' => ''
            ]
        );
    }

    private function setIconTemplate($item)
    {
        $iconTemplate = ArrayHelper::getValue($item, 'iconTemplate', $this->iconTemplate);
        if (isset($item['icon'])) {
            $iconTemplate = strtr($iconTemplate, ['{icon}' => $item['icon']]);
        }
        return $iconTemplate;
    }

    private function getMenuItems()
    {
        $modules = array_keys(Yii::$app->getModules());
        foreach ($modules as $moduleId) {
            $module = Yii::$app->getModule($moduleId);
            if (!empty($module->menu)) {
                $items[] = $module->menu;
            }
        }
        return $items;
    }
}
