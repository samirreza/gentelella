<?php

namespace theme\widgets\updateBox;

use yii\base\Widget;
use yii\base\InvalidConfigException;

class UpdateBox extends Widget
{
    public $lastUpdate;
    public $linkUrl;
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
            'log',
            [
                'lastUpdate' => $this->lastUpdate,
                'linkUrl' => $this->linkUrl,
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