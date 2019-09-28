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
    public $isActive = true; // false means adding a 'disabled' css rule to the button
    public $isDropDown = false;
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
            $isDropDown = isset($btnOptions['isDropDown']) ? $btnOptions['isDropDown'] :
            $this->isDropDown;
            $options = (empty($btnOptions['options'])) ? [] : $btnOptions['options'];
            Html::addCssClass($options, 'btn');

            $isActive = isset($btnOptions['isActive']) ? $btnOptions['isActive'] : $this->isActive;
            if (!$isActive && !$isDropDown) {
                $options['disabled'] = 'disabled';
                $options['onclick'] = 'return false';
            }

            switch ($action) {
                case 'create':
                    $label = empty($btnOptions['label']) ? 'افزودن' : $btnOptions['label'];
                    $icon = empty($btnOptions['icon']) ? 'plus' : $btnOptions['icon'];
                    if ($isActive) {
                        echo Button::widget([
                            'url' => ['create'],
                            'label' => $label,
                            'options' => $options,
                            'icon' => $icon,
                            'type' => 'info',
                            'visibleFor' => $visibleFor,
                            'visible' => $visible
                        ]);
                    } else {
                        $options['class'] = [];
                        echo Button::widget([
                            'url' => '#',
                            'label' => $label,
                            'options' => $options,
                            'icon' => $icon,
                            'visibleFor' => $visibleFor,
                            'visible' => $visible,
                        ]);
                    }
                    break;
                case 'update':
                    $label = empty($btnOptions['label']) ? 'ویرایش' : $btnOptions['label'];
                    $icon = empty($btnOptions['icon']) ? 'edit' : $btnOptions['icon'];
                    $type = empty($btnOptions['type']) ? 'primary' : $btnOptions['type'];
                    if ($isActive) {
                        echo Button::widget([
                            'url' => ['update', 'id' => $this->modelID],
                            'label' => $label,
                            'options' => $options,
                            'icon' => $icon,
                            'type' => $type,
                            'visibleFor' => $visibleFor,
                            'visible' => $visible
                        ]);
                    } else {
                        $options['class'] = [];
                        echo Button::widget([
                            'url' =>'#',
                            'label' => $label,
                            'options' => $options,
                            'icon' => $icon,
                            'visibleFor' => $visibleFor,
                            'visible' => $visible,
                        ]);
                    }

                    break;
                case 'delete':
                    $label = empty($btnOptions['label']) ? 'حذف' : $btnOptions['label'];
                    $icon = empty($btnOptions['icon']) ? 'times' : $btnOptions['icon'];
                    $type = empty($btnOptions['type']) ? 'danger' : $btnOptions['type'];
                    if ($isActive) {
                        echo Button::widget([
                            'url' => ['delete', 'id' => $this->modelID],
                            'label' => $label,
                            'icon' => $icon,
                            'type' => $type,
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
                    } else {
                        $options['class'] = [];
                        echo Button::widget([
                            'url' =>'#',
                            'label' => $label,
                            'options' => $options,
                            'icon' => $icon,
                            'visibleFor' => $visibleFor,
                            'visible' => $visible,
                        ]);
                    }
                    break;
                case 'index':
                    $label = empty($btnOptions['label']) ? 'مدیریت' : $btnOptions['label'];
                    $icon = empty($btnOptions['icon']) ? 'tasks' : $btnOptions['icon'];
                    if ($isActive) {
                        echo Button::widget([
                            'url' => ['index'],
                            'label' => $label,
                            'icon' => $icon,
                            'type' => 'info',
                            'visibleFor' => $visibleFor,
                            'visible' => $visible,
                            'options' => $options,
                        ]);
                    } else {
                        $options['class'] = [];
                        echo Button::widget([
                            'url' =>'#',
                            'label' => $label,
                            'options' => $options,
                            'icon' => $icon,
                            'visibleFor' => $visibleFor,
                            'visible' => $visible,
                        ]);
                    }
                    break;
                case 'gallery':
                    $label = empty($btnOptions['label']) ? 'گالری' : $btnOptions['label'] ;
                    $icon = empty($btnOptions['icon']) ? 'camera-retro' : $btnOptions['icon'];
                    if ($isActive) {
                        echo Button::widget([
                            'label' => $label,
                            'icon' => $icon,
                            'type' => 'info',
                            'url' => ['gallery', 'id' => $this->modelID],
                            'visibleFor' => $visibleFor,
                            'visible' => $visible,
                            'options' => $options
                        ]);
                    } else {
                        $options['class'] = [];
                        echo Button::widget([
                            'url' =>'#',
                            'label' => $label,
                            'options' => $options,
                            'icon' => $icon,
                            'visibleFor' => $visibleFor,
                            'visible' => $visible,
                        ]);
                    }
                    break;
                case 'categoriesIndex':
                    $label = empty($btnOptions['label']) ? 'مدیریت دسته ها' : $btnOptions['label'];
                    $icon = empty($btnOptions['icon']) ? 'tasks' : $btnOptions['icon'];
                    if ($isActive) {
                        echo Button::widget([
                            'url' => ['category/index'],
                            'label' => $label,
                            'icon' => $icon,
                            'type' => 'warning',
                            'visibleFor' => $visibleFor,
                            'visible' => $visible,
                            'options' => $options,
                        ]);
                    } else {
                        $options['class'] = [];
                        echo Button::widget([
                            'url' =>'#',
                            'label' => $label,
                            'options' => $options,
                            'icon' => $icon,
                            'visibleFor' => $visibleFor,
                            'visible' => $visible,
                        ]);
                    }
                    break;
                default:
                $button = $this->setOptions($btnOptions);
                // TODO clean this mess.
                if($isDropDown){
                    $isDropDownActive = $isActive?'':'nad-disabled';
                    // $options['class'] = [];
                    echo '<div class="btn btn-group">
                    <button type="button" class="btn btn-xs btn-'.$button['type'].' dropdown-toggle '.$isDropDownActive.'" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-'.$button['icon'].'"></i>
                      '.$button['label'].'<span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">';
                    foreach ($button['items'] as $key => $item) {
                        $isItemActive = is_null($item['isActive'])?true:$item['isActive'];
                        $itemOptions = isset($item['options'])?$item['options']: [];
                        if (!$isItemActive) {
                            $itemOptions['disabled'] = 'disabled';
                            $itemOptions['onclick'] = 'return false';
                            Html::removeCssClass($itemOptions, 'ajaxupdate');
                        }
                        echo '<li>';
                        if ($isItemActive) {
                            echo Button::widget([
                            'useDefaultCssClass' => false,
                            'url' => $item['url'],
                            'type' => 'default',
                            'label' => $item['label'],
                            'icon' => $item['icon'],
                            'options' => $itemOptions,
                            'visible' => $item['visible'],
                        ]);
                        }else{
                            // $options['class'] = [];
                            echo Button::widget([
                                'useDefaultCssClass' => false,
                                'url' =>'#',
                                'type' => 'default',
                                'label' => $item['label'],
                                'icon' => $item['icon'],
                                'options' => $itemOptions,
                                'visible' => $item['visible'],
                            ]);
                        }
                        echo '</li>';
                        echo '<li role="separator" class="divider"></li>';
                    }
                    echo '</ul>';
                    echo '</div>';
                }else{
                    if ($isActive) {
                        echo Button::widget([
                            'url' => $button['url'],
                            'label' => $button['label'],
                            'icon' => $button['icon'],
                            'type' => $button['type'],
                            'visibleFor' => $visibleFor,
                            'visible' => $visible,
                            'options' => $options,
                        ]);
                    } else {
                        $options['class'] = [];
                        echo Button::widget([
                            'url' =>'#',
                            'label' => $button['label'],
                            'icon' => $button['icon'],
                            'options' => $options,
                            'visibleFor' => $visibleFor,
                            'visible' => $visible,
                        ]);
                    }
                }
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
