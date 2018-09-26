<?php

namespace theme\widgets;

use yii\base\Widget;
use yii\base\InvalidConfigException;

class InfoBox extends Widget
{
    public $icon = 'user';
    public $count = 0;
    public $title = 'عنوان';
    public $visible = true;
    public $visibleFor;

    public function init()
    {
        parent::init();
        if (isset($this->visibleFor) and !is_array($this->visibleFor)) {
            throw new InvalidConfigException(
                '$visibleFor property should be an Array of authorization items (roles or permissions)'
            );
        }
        $this->checkIfVisible();
    }

    public function run()
    {
        if (!$this->visible) {
            return;
        }

        echo '<div class="tile-stats">';

        echo '<div class="icon">';
        echo '<i class="fa fa-' . $this->icon . '"></i> ';
        echo '</div>';

        echo '<div class="count">';
        echo $this->count;
        echo '</div>';

        echo '<h4>';
        echo $this->title;
        echo '</h4>';

        echo '</div>';
    }

    private function checkIfVisible()
    {
        if (isset($this->visibleFor)) {
            $this->visible = false;
            foreach ($this->visibleFor as $permission) {
                if (\Yii::$app->user->can($permission)) {
                    $this->visible = true;
                    return;
                }
            }
        }
    }
}