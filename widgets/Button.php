<?php
namespace theme\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use yii\base\InvalidConfigException;

class Button extends Widget
{
    public $url = false;
    public $label = 'دکمه';
    public $options = [];
    public $icon = 'heart';
    public $type = 'success';
    public $useDefaultCssClass = true;
    /**
     * only takes effect when @see $visibleFor property is not set
     * @var boolean
     */
    public $visible = true;
    /**
     * array of auth items (roles or permissions) that users with ONE OF those are allowed to see this button
     * overwrites @see $visible property when set
     * @var array
     */
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
        Html::addCssClass($this->options, 'btn btn-xs');
        if($this->useDefaultCssClass){
            Html::addCssClass($this->options, 'action-button');
        }
        if (empty($this->type)) {
            Html::addCssClass($this->options, 'btn-default');
        } else {
            Html::addCssClass($this->options, 'btn-' . $this->type);
        }
    }

    public function run()
    {
        if (!$this->visible) {
            return;
        }
        if ($this->icon) {
            $this->label = '<i class="fa fa-' . $this->icon . '"></i> ' . $this->label;
        }
        echo Html::a($this->label, $this->url, $this->options);
    }

    private function checkIfVisible()
    {
        if (!$this->visible) {
            return;
        }
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
