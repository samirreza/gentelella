<?php

use yii\helpers\Url;
use theme\widgets\infoBox\InfoBox;
use modules\changelog\models\ChangeLog;
use modules\nad\supplier\models\Supplier;
use modules\changelog\widgets\updateBox\UpdateBox;

$this->title = 'داشبورد';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="row">
    <div class="col-sm-12" style="text-align: center">
        <h3>به پنل مدیریت سامانه ی <?php echo Yii::$app->name ?> خوش آمدید</h3>
    </div>
</div>
<hr/>
<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <?= InfoBox::widget([
            'icon' => 'users',
            'count' => Supplier::find()->count(),
            'title' => 'تعداد تامین کنندگان',
            'visible' => Yii::$app->user->can('superuser')
        ]) ?>
    </div>
</div>
<hr/>
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <?= UpdateBox::widget([
            'lastUpdate' => ChangeLog::find()->orderBy(['date' => SORT_DESC])->limit(1)->all(),
            'linkUrl' => Url::to('changelog/manage/list'),
            'showLink' => true,
            'visible' => Yii::$app->user->can('superuser')
        ]) ?>
    </div>
</div>
