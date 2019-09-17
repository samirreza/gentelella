<?php

namespace theme\widgets\dateTimePicker;

use yii\widgets\InputWidget;
use extensions\i18n\date\lib\JDateTime;

class DateTimePicker extends InputWidget
{
    public $dateAttribute;
    public $hourAttribute;
    public $minuteAttribute;

    public function init()
    {
        if (!isset($this->attribute)) {
            $this->attribute = $this->dateAttribute;
        }
        $this->setUpdateScenarioValues();
        parent::init();
    }

    public function run()
    {
        return $this->render(
            'dateTime',
            [
                'model' => $this->model,
                'dateAttribute' => $this->dateAttribute,
                'hourAttribute' => $this->hourAttribute,
                'minuteAttribute' => $this->minuteAttribute
            ]
        );
    }

    private function setUpdateScenarioValues()
    {
        $jDateTime = new JDateTime();
        $model = $this->model;
        $dateAttr = $this->dateAttribute;
        $hourAttr = $this->hourAttribute;
        $minAttr = $this->minuteAttribute;
        if (
            isset($this->model) &&
            isset($model->$dateAttr) &&
            !empty($model->$dateAttr) &&
            is_int($model->$dateAttr)
        ) {
            $model->$hourAttr = $jDateTime->date('g', $model->$dateAttr, false);
            $model->$minAttr = $jDateTime->date('i', $model->$dateAttr, false);
        }
    }
}
