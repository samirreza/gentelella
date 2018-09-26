<?php

use theme\widgets\InfoBox;
use modules\nad\supplier\common\models\Supplier;
use modules\nad\equipment\modules\type\models\Type as EquipmentType;
use modules\nad\material\modules\type\models\Type as MaterialType;

$this->title = 'داشبورد';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="row">
    <div class="col-sm-12" style="text-align: center">
        <h3>به پنل مدیریت وب سایت <?php echo Yii::$app->name ?> خوش آمدید</h3>
    </div>
</div>
<br/><hr/><br/>
<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <?=
        InfoBox::widget([
            'icon' => 'users',
            'count' => Supplier::find()->count(),
            'title' => 'تعداد تامین کنندگان',
            'visible' => Yii::$app->user->can('superuser')
        ])
        ?>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <?=
        InfoBox::widget([
            'icon' => 'cogs',
            'count' => EquipmentType::find()->count(),
            'title' => 'تعداد تجهیزات',
            'visible' => Yii::$app->user->can('superuser')
        ])
        ?>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <?=
        InfoBox::widget([
            'icon' => 'flask',
            'count' => MaterialType::find()->count(),
            'title' => 'تعداد مواد',
            'visible' => Yii::$app->user->can('superuser')
        ])
        ?>
    </div>
</div>