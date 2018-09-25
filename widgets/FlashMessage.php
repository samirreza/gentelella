<?php

namespace theme\widgets;

use Yii;
use yii\base\Widget;
use yii\bootstrap\Alert;

class FlashMessage extends Widget
{
    public $alertClass;

    public function run()
    {
        foreach (Yii::$app->session->getAllFlashes() as $type => $messages) {
            if (!in_array($type, ['success', 'danger', 'error', 'warning', 'info'])) {
                $type = 'info';
            }
            $alertType = 'alert-' . $type;
            foreach ($messages as $message) {
                echo Alert::widget([
                    'options' => ['class' => "alert {$alertType} {$this->alertClass}"],
                    'body' => $message
                ]);
            }
        }
    }
}
?>

