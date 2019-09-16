<?php

use yii\helpers\Html;
use core\helpers\Utility;
use theme\widgets\jalalidatepicker\JalaliDatePicker;

?>

<div class="row">
    <div class="col-md-3">
        <?= Html::label('دقیقه') ?>
        <?= Html::activeDropDownList(
            $model,
            $minuteAttribute,
            Utility::listNumbers(0, 59),
            ['prompt' => 'دقیقه']
        ) ?>
    </div>
    <div class="col-md-3">
        <?= Html::label('ساعت') ?>
        <?= Html::activeDropDownList(
            $model,
            $hourAttribute,
            Utility::listNumbers(0, 23),
            ['prompt' => 'ساعت']
        ) ?>
    </div>
    <div class="col-md-7">
        <?= Html::label('روز') ?>
        <?= JalaliDatePicker::widget([
            'model' => $model,
            'attribute' => $dateAttribute,
            'options' => [
                'autocomplete' => 'off'
            ]
        ]) ?>
    </div>
</div>
