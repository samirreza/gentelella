<?php

namespace theme\widgets\jalalidatepicker;

use yii\helpers\Html;
use yii\helpers\Json;
use yii\widgets\InputWidget;
use extensions\i18n\date\DateTime;

class JalaliDatePicker extends InputWidget
{
    public $jsOptions = [];
    public $events = [];
    protected $dateTime;

    public function __construct(DateTime $dateTime, $config = [])
    {
        $this->dateTime = $dateTime;
        parent::__construct($config);
    }

    public function init()
    {
        if (!isset($this->options['class'])) {
            $this->options['class'] = 'form-control';
        }
        if (!isset($this->jsOptions['isRTL'])) {
            $this->jsOptions['isRTL'] = true;
        }
        if (!isset($this->jsOptions['changeMonth'])) {
            $this->jsOptions['changeMonth'] = true;
        }
        if (!isset($this->jsOptions['changeYear'])) {
            $this->jsOptions['changeYear'] = true;
        }
        if (!isset($this->jsOptions['dateFormat'])) {
            $this->jsOptions['dateFormat'] = 'yy/mm/dd';
        }
        if (!isset($this->jsOptions['weekStart'])) {
            $this->jsOptions['weekStart'] = 0;
        }
        if (!isset($this->value)) {
            $this->setValue();
        }
        parent::init();
    }

    public function run()
    {
        $id = $this->options['id'];
        $this->options = array_merge($this->options, ['value' => $this->value]);
        if ($this->hasModel()) {
            echo Html::activeTextInput($this->model, $this->attribute, $this->options);
        } else {
            echo Html::textInput($this->name, $this->value, $this->options);
        }
        $this->registerClientScript($id);
    }

    public function registerClientScript($id)
    {
        $view = $this->getView();
        DatePickerAsset::register($view);
        $options = !empty($this->jsOptions) ? Json::encode($this->jsOptions) : '';
        ob_start();
        echo "jQuery('#{$id}').datepicker({$options})";
        foreach ($this->events as $event => $handler) {
            echo ".on('{$event}', " . Json::encode($handler) . ')';
        }
        $view->registerJs(ob_get_clean() . ';');
    }

    private function setValue()
    {
        $model = $this->model;
        $attribute = $this->attribute;
        if (!isset($model) || empty($model->$attribute)) {
            $this->value = '';
        } elseif ($model->hasErrors($attribute)) {
            $this->value = $model->$attribute;
        } else {
            $this->value = $this->dateTime->date('Y/m/d', $model->$attribute, false);
        }
    }
}
