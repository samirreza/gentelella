<?php

namespace theme\widgets\infoBox;

use yii\base\Widget;
use yii\base\InvalidConfigException;

class InfoBox extends Widget
{
    public $icon = 'user';
    public $count = 0;
    public $showCount = true;
    public $title = 'عنوان';
    public $titleUrl = false;
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

        return $this->render(
            'box',
            [
                'title' => $this->title,
                'titleUrl' => $this->titleUrl,
                'count' => $this->count,
                'icon' => $this->icon,
                'showCount' => $this->showCount
            ]
        );
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