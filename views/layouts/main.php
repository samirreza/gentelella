<?php

use yii\helpers\Url;
use yii\helpers\Html;
use nad\common\SideMenu;
use yii\widgets\Breadcrumbs;
use theme\widgets\FlashMessage;
use nad\common\helpers\Utility;
use theme\assetbundles\IEAssetBundle;
use theme\assetbundles\ThemeAssetBundle;
use theme\widgets\HorizontalMenuContainer;

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
        <?php if(Utility::IsNullOrEmpty(Yii::$app->session->getAllFlashes())): ?>
            <div class="flash-message-container" style="display: none">
                <?= FlashMessage::widget() ?>
            </div>
        <?php else: ?>
            <div class="flash-message-container">
                <?= FlashMessage::widget() ?>
            </div>
        <?php endif; ?>
            <div class="main_container">
                <div class="col-md-3 left_col hidden-print">
                    <div class="left_col scroll-view">
                        <div class="navbar nav_title">
                            <div class="col-md-6">
                                <?= Html::a(
                                    Html::tag('span', Yii::$app->name),
                                    Url::home(),
                                    ['class' => 'site_title']
                                ) ?>
                            </div>
                            <div class="col-md-6">
                                <?= Html::a(
                                    '(خروج)',
                                    ['/user/auth/logout'],
                                    ['class' => 'site_title logout-button']
                                ) ?>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                            <div class="menu_section">
                                <?= SideMenu::widget() ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="top_nav hidden-print">
                    <div class="nav_menu">
                        <div class="row">
                            <!-- <div class="col-md-1 nav toggle">
                                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                            </div> -->
                            <div class="col-md-1 nav toggle">
                                <a onclick="toggleFullscreen();"><i class="fa fa-arrows"></i></a>
                            </div>
                            <div class="col-md-8">
                                <?php if (
                                    !isset($this->params['disableHorizontalMenu']) ||
                                    !$this->params['disableHorizontalMenu']
                                ) : ?>
                                    <?= HorizontalMenuContainer::widget(
                                        [
                                            'params' => $this->params // extra parameters from child views.
                                        ]
                                    ) ?>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-1 pull-right">
                                <a
                                id = "breadcrumb-popover-btn"
                                class = "btn btn-xs btn-default"
                                tabindex="0"
                                role="button"
                                data-toggle = "popover"
                                data-trigger = "focus"
                                title = "Dismissible popover"
                                data-content = '<?=
                                Breadcrumbs::widget([
                                    'tag' => 'ol',
                                    // 'options' => ['class' => ''],
                                    'homeLink' => [
                                        'label' => 'خانه',
                                        'url' => \yii::$app->homeUrl,
                                        'template' => '<li><i class="fa fa-home"></i> {link}</li>'
                                    ],
                                    'links' => isset($this->params['breadcrumbs']) ? array_map(function($link){
                                                if(!isset($link['label']))
                                                    return ((mb_strlen($link) > 30 )?mb_substr($link, 0, 30) . '...':$link);

                                                $newlabel = (mb_strlen($link['label']) > 30 )?mb_substr($link['label'], 0, 30) . '...':$link['label'];
                                                $newUrl = [
                                                    'label' => $newlabel,
                                                    'url' => $link['url']
                                                ];
                                                return $newUrl;
                                            }, $this->params['breadcrumbs']) : [],
                                ])
                                ?>'>
                                <i class="fa fa-map-marker"></i>
                                آدرس
                                </a>
                            </div>
                        </div>
                        <div class="row">

                        </div>
                        <!-- <div class="row text-center">
                            <h4><?= Html::encode($this->title) ?></h4>
                        </div> -->
                    </div>
                </div>
                <div class="right_col" role="main">
                    <div class="clearfix"></div>
                    <br>
                    <?= $content ?>
                </div>
            </div>
        </div>
        <!-- <a href="#" class="go-top"><i></i></a> -->
    <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
