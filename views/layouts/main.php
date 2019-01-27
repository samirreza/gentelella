<?php

use yii\helpers\Url;
use yii\helpers\Html;
use nad\common\SideMenu;
use yii\widgets\Breadcrumbs;
use theme\widgets\FlashMessage;
use theme\widgets\HorizontalMenu;
use theme\assetbundles\IEAssetBundle;
use theme\assetbundles\ThemeAssetBundle;

ThemeAssetBundle::register($this);
IEAssetBundle::register($this);

?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="nav-md">
    <?php $this->beginBody() ?>
        <div class="container body">
            <div class="flash-message-container">
                <?= FlashMessage::widget() ?>
            </div>
            <div class="main_container">
                <div class="col-md-3 left_col hidden-print">
                    <div class="left_col scroll-view">
                        <div class="navbar nav_title" style="border: 0;">
                            <?= Html::a(
                                Html::tag('span', Yii::$app->name),
                                Url::home(),
                                ['class' => 'site_title']
                            ) ?>
                        </div>
                        <div class="clearfix"></div>
                        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                            <div class="menu_section">
                                <?= SideMenu::widget() ?>
                            </div>
                        </div>
                        <div class="sidebar-footer hidden-small"></div>
                    </div>
                </div>
                <div class="top_nav hidden-print">
                    <div class="nav_menu">
                        <nav style="position: fixed;">
                            <div class="pull-right">
                                <div class="nav toggle">
                                    <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                                </div>
                                <?= HorizontalMenu::widget() ?>
                            <div class="pull-left">
                                <?= Breadcrumbs::widget([
                                    'tag' => 'ol',
                                    'homeLink' => [
                                        'label' => 'خانه',
                                        'url' => \yii::$app->homeUrl,
                                        'template' => '<li><i class="fa fa-dashboard"></i> {link}</li>'
                                    ],
                                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                                ]) ?>
                            </div>
                        </nav>
                        <br><br>
                        <div class="title">
                            <h1><?= Html::encode($this->title) ?></h1>
                        </div>
                    </div>
                </div>
                <div class="top_nav top_nav_fixed">
                    <div class="content-header">
                        <div class="row empty-row"></div>
                    </div>
                </div>
                <div class="right_col" role="main">
                    <div class="clearfix"></div>
                    <?= $content ?>
                </div>
                <footer class="hidden-print">
                    <div class="pull-left">
                    قالب پنل مدیریت <?= Yii::$app->name ?>
                    </div>
                    <div class="clearfix"></div>
                </footer>
            </div>
        </div>
    <a href="#" class="go-top"><i></i></a>
    <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
