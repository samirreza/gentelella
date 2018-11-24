<?php

namespace theme\widgets;

use yii\base\Widget;
use yii\helpers\Html;

class ActionButtons extends Widget
{
    public $buttons;
    public $modelID = null;
    public $visibleFor = null;
    public $visible = true;
    private $defaultIcon = 'caret-square-o-left';
    private $defaultLabel = 'دکمه';
    private $defaultType = 'primary';

    public function run()
    {
        echo '<div class="row">';
        echo '<div class="col-sm-12">';
        foreach ($this->buttons as $action => $btnOptions) {
            $visibleFor = (empty($btnOptions['visibleFor'])) ? $this->visibleFor : $btnOptions['visibleFor'];
            $visible = isset($btnOptions['visible']) ? $btnOptions['visible'] : $this->visible;
            $options = (empty($btnOptions['options'])) ? [] : $btnOptions['options'];
            Html::addCssClass($options, 'btn-app');
            switch ($action) {
                case 'create':
                    $label = empty($btnOptions['label']) ? 'افزودن' : $btnOptions['label'];
                    $icon = empty($btnOptions['icon']) ? 'plus' : $btnOptions['icon'];
                    echo Button::widget([
                        'url' => ['create'],
                        'label' => $label,
                        'options' => $options,
                        'icon' => $icon,
                        'type' => 'success',
                        'visibleFor' => $visibleFor,
                        'visible' => $visible
                    ]);
                    break;
                case 'update':
                    $label = empty($btnOptions['label']) ? 'ویرایش' : $btnOptions['label'];
                    $icon = empty($btnOptions['icon']) ? 'edit' : $btnOptions['icon'];
                    echo Button::widget([
                        'url' => ['update', 'id' => $this->modelID],
                        'label' => $label,
                        'options' => $options,
                        'icon' => $icon,
                        'type' => 'primary',
                        'visibleFor' => $visibleFor,
                        'visible' => $visible
                     ]);

                    break;
                case 'delete':
                    $label = empty($btnOptions['label']) ? 'حذف' : $btnOptions['label'];
                    $icon = empty($btnOptions['icon']) ? 'times' : $btnOptions['icon'];
                    echo Button::widget([
                        'url' => ['delete', 'id' => $this->modelID],
                        'label' => $label,
                        'icon' => $icon,
                        'type' => 'danger',
                        'visibleFor' => $visibleFor,
                        'visible' => $visible,
                        'options' => array_merge(
                            $options,
                            [
                                'data' => [
                                    'confirm' => 'آیا برای حذف مطمئن هستید؟',
                                    'method' => 'post',
                                ],
                            ]
                        ),
                     ]);
                    break;
                case 'index':
                     $label = empty($btnOptions['label']) ? 'مدیریت' : $btnOptions['label'];
                    $icon = empty($btnOptions['icon']) ? 'tasks' : $btnOptions['icon'];
                     echo Button::widget([
                        'url' => ['index'],
                        'label' => $label,
                        'icon' => $icon,
                        'type' => 'info',
                        'visibleFor' => $visibleFor,
                        'visible' => $visible,
                        'options' => $options,
                     ]);
                    break;
                case 'gallery':
                    $label = empty($btnOptions['label']) ? 'گالری' : $btnOptions['label'] ;
                    $icon = empty($btnOptions['icon']) ? 'camera-retro' : $btnOptions['icon'];
                    echo Button::widget([
                        'label' => $label,
                        'icon' => $icon,
                        'type' => 'info',
                        'url' => ['gallery', 'id' => $this->modelID],
                        'visibleFor' => $visibleFor,
                        'visible' => $visible,
                        'options' => $options
                     ]);
                    break;
                case 'categoriesIndex':
                    $label = empty($btnOptions['label']) ? 'مدیریت دسته ها' : $btnOptions['label'];
                    $icon = empty($btnOptions['icon']) ? 'tasks' : $btnOptions['icon'];
                    echo Button::widget([
                        'url' => ['category/index'],
                        'label' => $label,
                        'icon' => $icon,
                        'type' => 'warning',
                        'visibleFor' => $visibleFor,
                        'visible' => $visible,
                        'options' => $options,
                    ]);
                    break;
                default:
                    $button = $this->setOptions($btnOptions);
                    echo Button::widget([
                        'url' => $button['url'],
                        'label' => $button['label'],
                        'icon' => $button['icon'],
                        'type' => $button['type'],
                        'visible' => $visible,
                        'visibleFor' => $visibleFor,
                        'visible' => $visible,
                        'options' => $options,
                     ]);
                    break;
            }
        }
        echo '</div>';
        echo '</div>';
    }

    private function setOptions($btnOptions)
    {
        $btnOptions['label'] = (isset($btnOptions['label'])) ? $btnOptions['label'] :
            $this->defaultLabel;
        $btnOptions['icon'] = (isset($btnOptions['icon'])) ? $btnOptions['icon'] :
            $this->defaultIcon;
        $btnOptions['type'] = (isset($btnOptions['type'])) ? $btnOptions['type'] :
            $this->defaultType;

        return $btnOptions;
    }
}
